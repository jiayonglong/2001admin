<?php

namespace App\Admin\Controllers;

use App\Model\GoodsModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Model\CategoryModel;
use App\Model\BrandModel;
use Encore\Admin\Facades\Admin;

class GoodsController extends AdminController
{

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'GoodsModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsModel());

        $grid->column('goods_id', __('商品id'));
        $grid->column('goods_name', __('商品名称'));
        $grid->column('gooods_img', __('商品图片'))->image();
        // $grid->column('goods_imgs', __('商品相册'));
        $grid->column('goods_price', __('商品价格'));
        $grid->column('goods_desc', __('商品简介'));
        $grid->column('is_new', __('是否新品'))->display(function($is_new){
                switch ($is_new) {
                  case '1':
                      return '<span style="color: #00a7d0">是</span>';
                    break;
                  default:
                  return '<span style="color: red">否</span>';
                    break;
                }
        });
        $grid->column('is_heat', __('是否热卖'))->display(function($is_heat){
              switch ($is_heat) {
                case '1':
                  return '<span style="color: #00a7d0">是</span>';
                  break;

                default:
                    return '<span style="color: red">否</span>';
                  break;
              }
        });
        $grid->column('goods_num', __('商品存库'));
        // $grid->column('created_at', __('添加时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(GoodsModel::findOrFail($id));

        $show->field('goods_id', __('商品id'));
        $show->field('goods_name', __('商品名称'));
        $show->field('gooods_img', __('商品图片'));
        // $show->field('goods_imgs', __('商品相册'));
        $show->field('goods_price', __('商品简介'));
        $show->field('goods_desc', __('商品介绍'));
        $show->field('is_new', __('是否新品'));
        $show->field('is_heat', __('是否热卖'));
        $show->field('goods_num', __('商品存库'));
        $show->field('category_id', __('Category id'));
        $show->field('brand_id', __('Brand id'));
        // $show->field('created_at', __('添加时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
       protected function form()
    {

        $form = new Form(new GoodsModel());

        $form->text('goods_name', __('商品名称'));
        $form->file('gooods_img', __('商品图片'));
        // $form->file('goods_imgs', __('商品相册'));
        $form->decimal('goods_price', __('商品价格'));
        $form->textarea('goods_desc', __('商品简介'));
        $form->switch('is_new', __('是否新品'));
        $form->switch('is_heat', __('是否热卖'));
        $form->text('goods_num', __('商品存库'));
        $form->select('category_id', __('所属分类'))->options(CategoryModel::selectOptions())->default(1);
        $form->select('brand_id', __('所属品牌'))->options('/brand/json');
        // $form->select('brand_id')->options([1 => 'foo', 2 => 'bar', 'val' => 'Option name']);
        // $form->datetime('created_at', __('添加时间'))->default(date('Y-m-d H:i:s'));
        return $form;
    }

  }
