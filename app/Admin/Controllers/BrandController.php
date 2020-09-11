<?php

namespace App\Admin\Controllers;

use App\Model\BrandModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BrandController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BrandModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BrandModel());

        $grid->column('brand_id', __('品牌ID'));
        $grid->column('brand_name', __('品牌名称'));
        $grid->column('brand_desc', __('品牌简绍'));
        $grid->column('brand_logo', __('品牌图片'))->image();
        $grid->column('brand_url', __('品牌网址'));
        $grid->column('creatd_at', __('添加时间'));
        $grid->column('updated_at', __('修改时间'));

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
        $show = new Show(BrandModel::findOrFail($id));

        $show->field('brand_id', __('品牌ID'));
        $show->field('brand_name', __('品牌名称'));
        $show->field('brand_desc', __('品牌简绍'));
        $show->field('brand_logo', __('品牌图片'));
        $show->field('brand_url', __('品牌网址'));
        $show->field('creatd_at', __('添加时间'));
        $show->field('updated_at', __('修改时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
            $form = new Form(new BrandModel());
        $form->text('brand_name', __('品牌名称'));
        $form->text('brand_desc', __('品牌简绍'));
        $form->image('brand_logo', __('品牌图片'));
        $form->text('brand_url', __('品牌网址'));
        $form->datetime('creatd_at', __('添加时间'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
