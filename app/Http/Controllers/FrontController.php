<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SettingRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\PageRepository;
use App\Repositories\MenuRepository;
use App\Repositories\MessageRepository;
use App\Repositories\LinkRepository;
use App\Repositories\BannerRepository;
use App\Repositories\CustomPostTypeRepository;
use App\Models\SubmitLog;
use Illuminate\Support\Facades\Log;

use Mail;
use App\Models\Post;
use App\Models\Category;
use DB;

class FrontController extends Controller
{
    private $settingRepository;
    private $categoryRepository;
    private $postRepository;
    private $pageRepository;
    private $menuRepository;
    private $messageRepository;
    private $linkRepository;
    private $bannerRepository;
    private $customPostTypeRepository;

    public function __construct(
        SettingRepository $settingRepo,
        CategoryRepository $categoryRepo,
        PostRepository $postRepo,
        PageRepository $pageRepo,
        MenuRepository $menuRepo,
        MessageRepository $messageRepo,
        LinkRepository $linkRepo,
        BannerRepository $bannerRepo,
        CustomPostTypeRepository $customPostTypeRepo
    )
    {
        $this->settingRepository = $settingRepo;
        $this->categoryRepository = $categoryRepo;
        $this->postRepository = $postRepo;
        $this->pageRepository = $pageRepo;
        $this->menuRepository = $menuRepo;
        $this->messageRepository = $messageRepo;
        $this->linkRepository = $linkRepo;
        $this->bannerRepository = $bannerRepo;
        $this->customPostTypeRepository=$customPostTypeRepo;
    }

    
    private function getPostTemplate($cats){
        foreach ($cats as $key => $cat) {
            if (view()->exists('front.post.'.$cat->slug)) {
                return 'front.post.'.$cat->slug;
            }
        }
        //搜寻三层父类
        foreach ($cats as $key => $cat) {
            if ($cat->parent_id != 0) {
                $parent_cat = $this->categoryRepository->getCacheCategory($cat->parent_id);
                if (view()->exists('front.post.'.$parent_cat->slug)) {
                    return 'front.post.'.$parent_cat->slug;
                }
                if ($parent_cat->parent_id != 0) {
                    $granpa_cat = $this->categoryRepository->getCacheCategory($parent_cat->parent_id);
                    if (view()->exists('front.post.'.$granpa_cat->slug)) {
                        return 'front.post.'.$granpa_cat->slug;
                    }
                }
            }
        }
        return 'front.post.index';
    }

    /*
    *根据分类别名，获取可用的模板
    *依次寻找自身分类别名，父分类别名，如果都找不到这返回默认
     */
    private function getCatTemplate($slugOrId){
        $category = '';
        if (is_numeric($slugOrId)) {
            $category = $this->categoryRepository->getCacheCategory($slugOrId);
        } else {
            $category = $this->categoryRepository->getCacheCategoryBySlug($slugOrId);
        }
        //分类信息不存在
        if (empty($category)) {
            return 'front.cat.index';
        }
        if (view()->exists('front.cat.'.$category->slug)) {
            return 'front.cat.'.$category->slug;
        }else{
            if ($category->parent_id == 0) {
                return 'front.cat.index';
            } else {
                return $this->getCatTemplate($category->parent_id);
            }
        }
    }

    /*
    *获取分类的根分类
     */
    private function getCatRoot($slugOrId){
        $category = '';
        if (is_numeric($slugOrId)) {
            $category = $this->categoryRepository->getCacheCategory($slugOrId);
        } else {
            $category = $this->categoryRepository->getCacheCategoryBySlug($slugOrId);
        }
        //分类信息不存在
        if (empty($category)) {
            return null;
        }else{
            if ($category->parent_id == 0) {
                return $category;
            } else {
                return $this->getCatRoot($category->parent_id);
            }
        }
    }

    //根据分类id返回是否设定自定义字段附加对应的分类别名
    public function getCatRootSlug($cat_id){
        $category = $this->categoryRepository->getCacheCategory($cat_id);
        if (empty($category)) {
            return ['status'=>false,'msg'=>null];
        }else{
            if ($category->parent_id == 0) {
                $cat_custom=$this->customPostTypeRepository->getNameBySlug($category->slug);
                if(!empty($cat_custom)){
                    return ['status'=>true,'msg'=>$category->slug];
                }else{
                    return ['status'=>false,'msg'=>null];
                }
            } else {
                $cat_root= $this->getCatRoot($category->parent_id);
                $cat_custom=$this->customPostTypeRepository->getNameBySlug($cat_root->slug);
                if(!empty($cat_custom)){
                    return ['status'=>true,'msg'=>$cat_root->slug];
                }else{
                    return ['status'=>false,'msg'=>null];
                }
            }
        }
    }

    //首页
    public function index(Request $request)
    {
        #合适的英文名字决定孩子美好的开始
        $one = $this->categoryRepository->getCacheCategory('one');
        #有的中国人的英文名，在老外眼里都是奇葩
        $two = $this->categoryRepository->getCacheCategory('two');
        #选择正确英文名字的重要性
        $three = $this->categoryRepository->getCacheCategory('three');
        #为什么选择我们？
        $four = $this->categoryRepository->getCacheCategory('four');
        $input = $request->all();
        return view('front.index',compact('one','two','three','four','input'));
    }

    //结算
    public function check(Request $request){
        return view('front.check');
    }

    //分类页面
    public function cat(Request $request, $id)
    {
        $category = $this->categoryRepository->getCacheCategory($id);
        //分类信息不存在
        if (empty($category)) {
            return redirect('/');
        }
        $cats = $this->categoryRepository->getCacheChildCatsOfParentBySlug($this->getCatRoot($category->id)->slug);

        $take = empty(getSettingValueByKey('front_take')) ? 1 : getSettingValueByKey('front_take');
        $skip = 0;
        $input = $request->all();

        $last_link = 0;
        $next_link = 2;
        $next_skip = $take;
        if(array_key_exists('page',$input) && !empty($input['page'])){
            $skip = $take * ($input['page'] - 1);
            $next_skip = $take * $input['page'];
            $last_link = $input['page'] - 1;
            $next_link = $input['page'] + 1;
        }

        $posts = $this->categoryRepository->getCachePostOfCatIncludeChildren($category,$take,$skip);

        $next_pages_posts=  $this->categoryRepository->getCachePostOfCatIncludeChildren($category,$take,$next_skip);
          
        if( !count($posts) || !count($next_pages_posts)){
             $next_link = 0;
        }

        //是否为该分类自定义了模板
        return view($this->getCatTemplate($category->id))
            ->with('category', $category)
            ->with('cats', $cats)
            ->with('posts', $posts)
            ->with('last_link',$last_link)
            ->with('next_link',$next_link);
    }

    //文章页面
    public function post(Request $request, $id)
    {
        $post = $this->postRepository->getCachePost($id);
        //分类信息不存在
        if (empty($post)) {
            return redirect('/');
        }
        $post->update(['view' => $post->view + 1]);

        //$prePost = $this->postRepository->PrevPost($id);
        //$nextPost = $this->postRepository->NextPost($id);
        //是否为该分类自定义了模板
        //一个文章会属于几个分类
        $cats = $post->cats;
        $posts = $cats->first()->posts()->get();
        /*
        foreach ($cats as $key => $cat) {
            if (view()->exists('front.post.'.$cat->slug)) {
                return view('front.post.'.$cat->slug)->with('post', $post)->with('posts', $posts);
            }
        }
        return view('front.post.index')->with('post', $post)->with('posts', $posts);
        */
       return view($this->getPostTemplate($cats))->with('post', $post)->with('posts', $posts);
    }

    //单页面
    public function page(Request $request, $id)
    {
        $page = '';
        if (is_numeric($id)) {
            $page = $this->pageRepository->getCachePage($id);
        } else {
            $page = $this->pageRepository->getCachePageBySlug($id);
        }
        
        //分类信息不存在
        if (empty($page)) {
            return redirect('/');
        }

        $page->update(['view' => $page->view + 1]);

        //是否为该分类自定义了模板
        if (view()->exists('front.page.'.$page->slug)) {
            return view('front.page.'.$page->slug)->with('page', $page);
        } else {
            return view('front.page.index')->with('page', $page);
        }
    }

    public function submitInfo(Request $request){
        $input = $request->all();
        $input['price'] = empty(getSettingValueByKey('name_price')) ? 10 : getSettingValueByKey('name_price');
        $log = SubmitLog::create($input);

        return ['code'=>0,'message'=> $log->id];
    }

    public function varifyPayStatus($id){
        $log = SubmitLog::find($id);
        if(empty($log)){
            return ['code'=>1,'message'=>'没有该提交记录'];
        }
        if($log->pay_status == '已支付'){
            return ['code'=>0,'message'=>'支付成功'];
        }
        else{
             return ['code'=>3,'message'=>'等待支付中'];
        }
    }

    public function tmp(Request $request)
    {
        return view('front.tmp');
    }



}
