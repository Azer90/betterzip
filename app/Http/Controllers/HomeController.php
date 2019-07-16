<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/15
 * Time: 11:47
 */

namespace App\Http\Controllers;


use App\Article;
use App\Classify;

class HomeController
{
    use BaseController;

    public function Home()
    {   $nav=$this->nav;
        $name=$this->name;
        $seo=$this->seo;
        $config=$this->system;
        return view('Home.Home')->with(compact('nav','name','seo','config'));
    }

    public function Feature()
    {
        $nav=$this->nav;
        $name=$this->name;
        $seo=$this->seo;
        $config=$this->system;
        return view('Home.Feature')->with(compact('nav','name','seo','config'));
    }

    public function Download()
    {
        $nav=$this->nav;
        $name=$this->name;
        $seo=$this->seo;
        $config=$this->system;
        return view('Home.Download')->with(compact('nav','name','seo','config'));
    }

    public function Purchase()
    {
        $nav=$this->nav;
        $name=$this->name;
        $seo=$this->seo;
        $config=$this->system;
        $pay_config=$this->pay_config;
        return view('Home.Purchase')->with(compact('nav','name','seo','config','pay_config'));
    }
    public  function Support($cid=1){
        $nav=$this->nav;
        $name=$this->name;
        $seo=$this->seo;
        $config=$this->system;
        $cate_lists = Classify::get();
        $article_lists = Article::where(['classify_id' => $cid])->paginate(9);
        $category = Classify::find($cid,['name']);
        $cate_name=$category->name;
        //return view('Home.Support',['cate_lists' => $lists,'article_lists' => $article_lists,'cate_name' => $category->cate_name]);
        return view('Home.Support')->with(compact('nav','name','seo','config','cate_lists','article_lists','cate_name'));
    }
    public  function Detail($id){
        $nav=$this->nav;
        $name=$this->name;
        $seo=$this->seo;
        $config=$this->system;
        $cate_lists = Classify::get();
        $article = Article::where(['id' => $id])->first();
        return view('Home.Detail')->with(compact('nav','name','seo','config','cate_lists','article'));
    }

}