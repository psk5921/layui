<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Route\route_save.html";i:1578017333;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1577767329;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo (isset($web_title) && ($web_title !== '')?$web_title:''); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/build/css/app.css" media="all">

    <!--页面菜单滑出特效-->
    <link rel="shortcut icon" href="/static/admin/left_move/favicon.ico">
    <!--<link rel="stylesheet" type="text/css" href="/static/admin/left_move/css/default.css" />-->
    <link rel="stylesheet" type="text/css" href="/static/admin/left_move/css/component.css" />
    <script src="/static/admin/left_move/js/modernizr.custom.js"></script>
</head>
<style>
    .hidden{
        display: none;
    }
    #layui-layer-iframe2{
        height: 4.40rem;
    }

    .file_img{
        width: 100px;
        height: 100px;
        float: left;
        margin:0 .4rem .4rem 0;
        position: relative;
        overflow: hidden;
    }
    .del_file{
        color: red;
        position: absolute;
        right: 0;
        top: 0;
    }
    .file_img img{
        width: 100%;
        height: 100%
    }

    .file_pdf{
        width: 100px;
        height: 100px;
        float: left;
        margin:0 .4rem .4rem 0;
        position: relative;
        overflow: hidden;
    }
    .icon_video{
        color: #707070;
        font-size: 4rem;
        margin-left: 1rem;
    }
    body{overflow-y: scroll;} /* 禁止刷新后出现横向滚动条 */
</style>

<div style="height:90rem;overflow-x: hidden;width: 98%;margin: auto;padding-top: 1rem;" class="cbp-spmenu-push">
    <div class="layui-form-pane">
        <!--国内版路线设置-->

        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li lay-id="1" class="layui-this">路线信息</li>
                <?php if(isset($info)): ?>
                <li lay-id="2">路线设计</li>
                <li lay-id="3">路线行程</li>
                <li lay-id="4">注意事项</li>
                <li lay-id="5">费用说明</li>
                <li lay-id="6">行程助手</li>
                <li lay-id="7">路线口碑</li>
                <li lay-id="8">相似路线</li>
                <?php endif; ?>
            </ul>

            <div class="layui-tab-content">
                <!--路线信息-->
                <div class="layui-tab-item layui-show layui-row layui-form">
                    <!--路线id-->
                    <input type="hidden" name="route_id" value="<?php echo (isset($info['route_id']) && ($info['route_id'] !== '')?$info['route_id']:''); ?>">

                    <?php if($route_type==1): ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">国际洲</label>
                        <div class="layui-input-inline">
                            <select name="international_parent" lay-filter="international_parent" lay-verify="required">
                                <option value="">选择洲信息</option>
                            </select>
                        </div>
                        <label class="layui-form-label">所属国家</label>
                        <div class="layui-input-inline">
                            <select name="international_id" lay-verify="required">
                                <option value="">选择国家</option>
                            </select>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属区域</label>
                        <div class="layui-input-inline">
                            <select name="region_id" lay-verify="required">
                                <option value="">选择区域</option>
                            </select>
                        </div>
                        <label class="layui-form-label">所属片区</label>
                        <div class="layui-input-inline">
                            <select name="area_id" lay-verify="required">
                                <option value="">选择片区</option>
                            </select>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">主标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="route_name" value="<?php echo (isset($info['route_name']) && ($info['route_name'] !== '')?$info['route_name']:''); ?>" lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">副标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="route_slogan" value="<?php echo (isset($info['route_slogan']) && ($info['route_slogan'] !== '')?$info['route_slogan']:''); ?>" lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">路线版本</label>
                        <div class="layui-input-inline">
                            <input type="text" name="edition_info" value="<?php echo (isset($info['edition_info']) && ($info['edition_info'] !== '')?$info['edition_info']:''); ?>" class="layui-input">
                        </div>
                        <label class="layui-form-label">英文简称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="english_shorthand" value="<?php echo (isset($info['english_shorthand']) && ($info['english_shorthand'] !== '')?$info['english_shorthand']:''); ?>" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">行程轨迹</label>
                        <div class="layui-input-block">
                            <input type="text" name="trip_name" value="<?php echo (isset($info['trip_name']) && ($info['trip_name'] !== '')?$info['trip_name']:''); ?>" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">路线简介</label>
                        <div class="layui-input-block">
                            <textarea name="route_describe"  placeholder="请输入内容" class="layui-textarea"><?php echo (isset($info['route_describe']) && ($info['route_describe'] !== '')?$info['route_describe']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">标准价格</label>
                        <div class="layui-input-inline">
                            <input type="number" name="standard_price" value="<?php echo (isset($info['standard_price']) && ($info['standard_price'] !== '')?$info['standard_price']:'0'); ?>"  class="layui-input">
                        </div>

                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="number" name="order_list" value="<?php echo (isset($info['order_list']) && ($info['order_list'] !== '')?$info['order_list']:''); ?>" lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">价格描述</label>
                        <div class="layui-input-inline">
                            <input type="text" name="price_title" value="<?php echo (isset($info['price_title']) && ($info['price_title'] !== '')?$info['price_title']:'0'); ?>"  class="layui-input">
                        </div>

                        <label class="layui-form-label">人数描述</label>
                        <div class="layui-input-inline">
                            <input type="text" name="people_number_title" value="<?php echo (isset($info['people_number_title']) && ($info['people_number_title'] !== '')?$info['people_number_title']:''); ?>" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">旅行时长</label>
                        <div class="layui-input-inline">
                            <input type="text" name="time_length" value="<?php echo (isset($info['time_length']) && ($info['time_length'] !== '')?$info['time_length']:''); ?>" class="layui-input">
                        </div>
                        <label class="layui-form-label">年龄限制</label>
                        <div class="layui-input-inline">
                            <input type="text" name="age_info" value="<?php echo (isset($info['age_info']) && ($info['age_info'] !== '')?$info['age_info']:''); ?>" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">体力强度</label>
                        <div class="layui-input-inline" style="margin-left: 1rem">
                            <div id="start1"></div>
                            <input type="hidden" name="strength_number"  value="<?php echo (isset($info['strength_number']) && ($info['strength_number'] !== '')?$info['strength_number']:5); ?>">
                        </div>
                        <label class="layui-form-label">文化冲击</label>
                        <div class="layui-input-inline" style="margin-left: 1rem">
                            <div id="start2"></div>
                            <input type="hidden" name="culture_number"  value="<?php echo (isset($info['culture_number']) && ($info['culture_number'] !== '')?$info['culture_number']:5); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">路线类型</label>
                        <?php if($route_type==1): ?>
                        <div class="layui-input-block">
                            <input type="radio" name="route_type" value="1" title="国际" <?php if(isset($info) && $info['route_type']=='1'): ?>checked<?php endif; ?>>
                        </div>
                        <?php else: ?>
                        <div class="layui-input-block">
                            <input type="radio" name="route_type" value="2" title="短途" <?php if(isset($info) && $info['route_type']=='2'): ?>checked<?php endif; ?>>
                            <input type="radio" name="route_type" value="3" title="长途" <?php if(isset($info) && $info['route_type']=='3'): ?>checked<?php endif; ?>>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">路线主题</label>
                        <div class="layui-input-block theme_list">

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">路线分级</label>
                        <div class="layui-input-block">
                            <input type="radio" name="route_class" value="1" title="一级路线" <?php if(isset($info) && $info['route_class']=='1'): ?>checked<?php endif; ?>>
                            <input type="radio" name="route_class" value="2" title="二级路线" <?php if(isset($info) && $info['route_class']=='2'): ?>checked<?php endif; ?>>
                            <input type="radio" name="route_class" value="3" title="三级路线" <?php if(isset($info) && $info['route_class']=='3'): ?>checked<?php endif; ?>>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属团体</label>
                        <div class="layui-input-block">
                            <?php foreach($group_customization as $item): ?>
                            <input type="radio" name="group_customization" value="<?php echo $item['base_id']; ?>" title="<?php echo $item['value']; ?>" <?php if(isset($info) && $info['group_customization']==$item['base_id']): ?>checked<?php endif; ?>>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">推荐配置</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="recommend_config[0]" value="1" title="主页推荐" <?php if(isset($info) && in_array(1,$info['recommend_config'])): ?>checked<?php endif; ?>>
                            <input type="checkbox" name="recommend_config[1]" value="2" title="国际旅行推荐" <?php if(isset($info) && in_array(2,$info['recommend_config'])): ?>checked<?php endif; ?>>
                            <input type="checkbox" name="recommend_config[2]" value="3" title="国内长途推荐" <?php if(isset($info) && in_array(3,$info['recommend_config'])): ?>checked<?php endif; ?>>
                            <input type="checkbox" name="recommend_config[3]" value="4" title="国内短途推荐" <?php if(isset($info) && in_array(4,$info['recommend_config'])): ?>checked<?php endif; ?>>
                            <input type="checkbox" name="recommend_config[4]" value="5" title="团体旅行推荐" <?php if(isset($info) && in_array(5,$info['recommend_config'])): ?>checked<?php endif; ?>>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">路线徽章</label>
                        <div class="layui-input-block badge_list">

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">民族限制</label>
                        <div class="layui-input-block">
                            <input type="text" name="limit_nation" value="<?php echo (isset($info['limit_nation']) && ($info['limit_nation'] !== '')?$info['limit_nation']:''); ?>"  placeholder="请输入需要限制的民族名称，多个已英文逗号隔开" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <p style="color: red">*请上传800*450px的图片</p>
                        <label class="layui-form-label">路线主图</label>
                        <div class="layui-input-block">
                            <div id="route_img">
                                <?php if(isset($info) && !empty($info['route_img'])): foreach($info['route_img'] as $item): ?>
                                <div class="file_img" data-type="img">
                                    <i class="layui-icon del_file">&#x1007;</i>
                                    <img src="<?php echo $item['url']; ?>">
                                    <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="route_img[<?php echo $item['file_id']; ?>]"/>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                            <button class="layui-btn add_file" data-id="route_img">选择图片</button>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <p style="color: red">*请上传380*290px的图片 只需上传一张</p>
                        <label class="layui-form-label">PC列表主图</label>
                        <div class="layui-input-block">
                            <div id="pc_list_img">
                                <?php if(isset($info) && !empty($info['pc_list_img'])): foreach($info['pc_list_img'] as $item): ?>
                                <div class="file_img" data-type="img">
                                    <i class="layui-icon del_file">&#x1007;</i>
                                    <img src="<?php echo $item['url']; ?>">
                                    <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="pc_list_img[<?php echo $item['file_id']; ?>]"/>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                            <button class="layui-btn add_file" data-id="pc_list_img">选择图片</button>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <p style="color: red">*请上传1600*354px的图片</p>
                        <label class="layui-form-label">PC长banner</label>
                        <div class="layui-input-block">
                            <div id="pc_banner">
                                <?php if(isset($info) && !empty($info['pc_banner'])): foreach($info['pc_banner'] as $item): ?>
                                <div class="file_img" data-type="img">
                                    <i class="layui-icon del_file">&#x1007;</i>
                                    <img src="<?php echo $item['url']; ?>">
                                    <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="pc_banner[<?php echo $item['file_id']; ?>]"/>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                            <button class="layui-btn add_file" data-id="pc_banner">选择图片</button>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <p style="color: red">*请上传1200*480px的图片</p>
                        <label class="layui-form-label">PC推荐图</label>
                        <div class="layui-input-block">
                            <div id="pc_banner2">
                                <?php if(isset($info) && !empty($info['pc_banner2'])): foreach($info['pc_banner2'] as $item): ?>
                                <div class="file_img" data-type="img">
                                    <i class="layui-icon del_file">&#x1007;</i>
                                    <img src="<?php echo $item['url']; ?>">
                                    <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="pc_banner2[<?php echo $item['file_id']; ?>]"/>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                            <button class="layui-btn add_file" data-id="pc_banner2">选择图片</button>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <p style="color: red">*请上传720*480px的图片</p>
                        <label class="layui-form-label">手机banner</label>
                        <div class="layui-input-block">
                            <div id="mobile_banner">
                                <?php if(isset($info) && !empty($info['mobile_banner'])): foreach($info['mobile_banner'] as $item): ?>
                                <div class="file_img" data-type="img">
                                    <i class="layui-icon del_file">&#x1007;</i>
                                    <img src="<?php echo $item['url']; ?>">
                                    <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="mobile_banner[<?php echo $item['file_id']; ?>]"/>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                            <button class="layui-btn add_file" data-id="mobile_banner">选择图片</button>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">是否竖图</label>
                        <div class="layui-input-block">
                            <input type="radio" name="style_type" value="2" title="不是" <?php if(isset($info) && $info['style_type']==2): ?>checked<?php endif; ?>>
                            <input type="radio" name="style_type" value="1" title="是" <?php if(isset($info) && $info['style_type']==1): ?>checked<?php endif; ?>>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <p style="color: red">*请上传700*700px的图片，上传多张图片，系统默认第一张为主图</p>
                        <label class="layui-form-label">手机竖图</label>
                        <div class="layui-input-block">
                            <div id="style_img">
                                <?php if(isset($info) && !empty($info['style_img'])): foreach($info['style_img'] as $item): ?>
                                <div class="file_img" data-type="img">
                                    <i class="layui-icon del_file">&#x1007;</i>
                                    <img src="<?php echo $item['url']; ?>">
                                    <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="style_img[<?php echo $item['file_id']; ?>]"/>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                            <button class="layui-btn add_file" data-id="style_img">选择图片</button>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <p style="color: red">*请上传PDF格式的文件，网站才能更好的展示</p>
                        <label class="layui-form-label">路线文件</label>
                        <div class="layui-input-block">
                            <div id="route_file">
                                <?php if(isset($info) && !empty($info['route_file'])): foreach($info['route_file'] as $item): ?>
                                <div class="file_img" data-type="img" style="height: 120px;">
                                    <i class="layui-icon del_file">&#x1007;</i>
                                    <i class="layui-icon pdf" style="font-size: 5.5rem;color: #ccc;">&#xe655;</i>
                                    <span><?php echo $item['file_name']; ?></span>
                                    <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="route_file[<?php echo $item['file_id']; ?>]"/>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                            <button class="layui-btn add_file" data-id="route_file">选择文件</button>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">路线状态</label>
                        <div class="layui-input-inline">
                            <select name="state" lay-verify="required">
                                <option value="1" <?php if(isset($info)): if($info['state']==1): ?>selected<?php endif; endif; ?>>进行中</option>
                                <option value="2" <?php if(isset($info)): if($info['state']==2): ?>selected<?php endif; endif; ?>>已关闭</option>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="submit_route">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary close">关闭</button>
                        </div>
                    </div>
                </div>

                <!--路线设计-->
                <div class="layui-tab-item layui-form">
                    <input type="hidden" name="route_id" value="<?php echo (isset($info['route_id']) && ($info['route_id'] !== '')?$info['route_id']:''); ?>">

                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                        <legend>路线概览信息</legend>
                    </fieldset>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">描述内容</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content_overview"><?php echo (isset($info['content_overview']) && ($info['content_overview'] !== '')?$info['content_overview']:''); ?></textarea>
                        </div>
                    </div>

                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                        <legend>版本内容信息</legend>
                    </fieldset>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">描述内容</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content_edition"><?php echo (isset($info['content_edition']) && ($info['content_edition'] !== '')?$info['content_edition']:''); ?></textarea>
                        </div>
                    </div>

                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                        <legend>路线特色内容</legend>
                    </fieldset>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">概览标题</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content_feature"><?php echo (isset($info['content_feature']) && ($info['content_feature'] !== '')?$info['content_feature']:''); ?></textarea>
                        </div>
                    </div>

                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                        <legend>路线记录片</legend>
                    </fieldset>
                    <div class="layui-form-item">
                        <p style="color: red">*请上传900x600px的图片，上传多张图片，系统默认第一张为主图</p>
                        <label class="layui-form-label">纪录片</label>
                        <div class="layui-input-block">
                            <div id="route_video">
                                <?php if(isset($info) && !empty($info['route_video'])): foreach($info['route_video'] as $item): ?>
                                <div class="file_img" data-type="video">
                                    <i class="layui-icon del_file">&#x1007;</i>
                                    <i class="layui-icon icon_video">&#xe652;</i>
                                    <span><?php echo (isset($item['file_name']) && ($item['file_name'] !== '')?$item['file_name']:''); ?></span>
                                    <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="route_video[<?php echo $item['file_id']; ?>]"/>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                            <button class="layui-btn add_file" data-id="route_video">选择视频</button>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="submit_route_content">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary close">关闭</button>
                        </div>
                    </div>

                </div>

                <!--路线行程-->
                <div class="layui-tab-item layui-form">

                    <button class="layui-btn layui-btn-normal add_trip"><i class="layui-icon">&#xe654;</i>添加行程</button>
                    <table class="layui-table" lay-data="{height: 'full-100', url:'<?php echo url('Route/ApiGetRouteTripPage'); ?>?route_id=<?php echo (isset($info['route_id']) && ($info['route_id'] !== '')?$info['route_id']:''); ?>', limit:100, id:'testReload_trip',even: true,loading:true}" lay-filter="demo_trip">
                        <thead>
                        <tr>
                            <th lay-data="{field:'trip_day'}">行程第几天</th>
                            <th lay-data="{field:'trip_name'}">行程名称</th>
                            <th lay-data="{field:'resort',templet: '#server_number'}">集合地点</th>
                            <th lay-data="{field:'accommodation'}">住宿</th>
                            <th lay-data="{field:'destination',templet: '#server_number'}">目的地</th>
                            <th lay-data="{field:'status', templet: '#status_trip',width:100}">状态</th>
                            <th lay-data="{fixed: '', width:120,fixed: 'right', align:'center', toolbar: '#barDemo_trip'}">操作</th>
                        </tr>
                        </thead>
                        <script type="text/html" id="barDemo_trip">
                            <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                        </script>
                        <script type="text/html" id="status_trip">
                            {{#  if(d.state == 1){ }}
                            <span style="color: #5FB878">进行中</span>
                            {{#  } else if( d.state ==0) { }}
                            <span style="color: #FF5722">已关闭</span>
                            {{#  } }}
                        </script>
                    </table>

                </div>

                <!--注意事项-->
                <div class="layui-tab-item layui-form">
                    <input type="hidden" name="route_id" value="<?php echo (isset($info['route_id']) && ($info['route_id'] !== '')?$info['route_id']:''); ?>">
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">行前提示</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content1"><?php echo (isset($route_content['content_xqts']) && ($route_content['content_xqts'] !== '')?$route_content['content_xqts']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">报名问题</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content2"><?php echo (isset($route_content['content_bmwt']) && ($route_content['content_bmwt'] !== '')?$route_content['content_bmwt']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">其他问题</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content3"><?php echo (isset($route_content['content_qtwt']) && ($route_content['content_qtwt'] !== '')?$route_content['content_qtwt']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">路线FAQ</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content4"><?php echo (isset($route_content['content_faq']) && ($route_content['content_faq'] !== '')?$route_content['content_faq']:''); ?></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="submit_zy">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary close">关闭</button>
                        </div>
                    </div>

                </div>

                <!--费用说明-->
                <div class="layui-tab-item layui-form">

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">旅行政策</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content10"><?php echo (isset($route_content['content_lxfy']) && ($route_content['content_lxfy'] !== '')?$route_content['content_lxfy']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">优惠政策</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content11"><?php echo (isset($route_content['content_yhzc']) && ($route_content['content_yhzc'] !== '')?$route_content['content_yhzc']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">费用包含</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content12"><?php echo (isset($route_content['content_fybh']) && ($route_content['content_fybh'] !== '')?$route_content['content_fybh']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">退款及取消旅行原则</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content13"><?php echo (isset($route_content['content_tkyz']) && ($route_content['content_tkyz'] !== '')?$route_content['content_tkyz']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">VIVA承诺</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content14"><?php echo (isset($route_content['content_cn']) && ($route_content['content_cn'] !== '')?$route_content['content_cn']:''); ?></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="submit_fy">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary close">关闭</button>
                        </div>
                    </div>

                </div>

                <!--行程助手-->
                <div class="layui-tab-item layui-form">

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">行前提示</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content17"><?php echo (isset($route_content['content_xqts2']) && ($route_content['content_xqts2'] !== '')?$route_content['content_xqts2']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">行前准备</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content15"><?php echo (isset($route_content['content_xqzb']) && ($route_content['content_xqzb'] !== '')?$route_content['content_xqzb']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">旅行前奏</label>
                        <div class="layui-input-block">
                            <textarea class="content" id="content16"><?php echo (isset($route_content['content_lxzz']) && ($route_content['content_lxzz'] !== '')?$route_content['content_lxzz']:''); ?></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="submit_zs">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary close">关闭</button>
                        </div>
                    </div>

                </div>

                <!--路线评价-->
                <div class="layui-tab-item layui-form">
                    <a href="<?php echo url('Route/route_comment_save'); ?>?route_id=<?php echo (isset($info['route_id']) && ($info['route_id'] !== '')?$info['route_id']:''); ?>">
                        <button class="layui-btn layui-btn-normal"><i class="layui-icon">&#xe654;</i>添加口碑</button>
                    </a>
                    <table class="layui-table" lay-data="{height: 'full-200', url:'<?php echo url('Route/ApiGetRouteCommentPage'); ?>?route_id=<?php echo (isset($info['route_id']) && ($info['route_id'] !== '')?$info['route_id']:''); ?>', limit:50, id:'testReload_comment',even: true,loading:true}" lay-filter="demo_comment">
                        <thead>
                        <tr>
                            <th lay-data="{field:'user_name'}">评价人</th>
                            <th lay-data="{field:'content'}">内容</th>
                            <th lay-data="{field:'comment_date'}">时间</th>
                            <th lay-data="{field:'admin_name'}">操作人</th>
                            <th lay-data="{field:'status', templet: '#status_trip',width:100}">状态</th>
                            <th lay-data="{fixed: '', width:120,fixed: 'right', align:'center', toolbar: '#barDemo_comment'}">操作</th>
                        </tr>
                        </thead>
                        <script type="text/html" id="barDemo_comment">
                            <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                        </script>
                        <script type="text/html" id="status_comment">
                            {{#  if(d.state == 1){ }}
                            <span style="color: #5FB878">进行中</span>
                            {{#  } else if( d.state ==0) { }}
                            <span style="color: #FF5722">已关闭</span>
                            {{#  } }}
                        </script>
                    </table>
                </div>

                <!--相似路线-->
                <div class="layui-tab-item layui-form">
                    <button class="layui-btn layui-btn-normal add_similar"><i class="layui-icon">&#xe654;</i>添加相似</button>
                    <table class="layui-table" lay-data="{ url:'<?php echo url('Route/ApiGetRouteSimilarPage'); ?>?route_id=<?php echo (isset($info['route_id']) && ($info['route_id'] !== '')?$info['route_id']:''); ?>', limit:30, id:'Reload_list',even: true,loading:true}" lay-filter="demo_route">
                        <thead>
                        <tr>
                            <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
                            <th lay-data="{field:'route_name'}">区域名称</th>
                            <th lay-data="{field:'route_name'}">路线名称</th>
                            <th lay-data="{field:'edition_info',width:130}">路线版本</th>
                            <th lay-data="{field:'standard_price',width:130}">标准价格</th>
                            <th lay-data="{field:'time_length',width:100,templet: '#regional_type'}">时长(天)</th>
                        </tr>
                        </thead>
                    </table>
                </div>

            </div>

        </div>

        <div style="margin-bottom: 2rem"></div>
    </div>

    <script src="/static/admin/layui/layui.js"></script>
<script src="/static/common/js/jquery.min.js"></script>
<script src="/static/admin/left_move/js/classie.js"></script>

<script>

    $('.return_url').click(function () {
        window.history.go(-1);
    })
    //移除弹框
    $('.right_move').on('click',function () {
        $('.cbp-spmenu-right').removeClass('cbp-spmenu-open');
    })
    //添加文件
    $('.add_file').click(function () {
        var node_id=$(this).data('id');
        layer.open({
            type: 2,
            title: '选择文件',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['100%', '100%'],
            content: '<?php echo url("BaseInfo/file_list"); ?>?node_id='+node_id,
        });
    })

    //查看放大文件
    $("body").delegate('.file_img','click',function () {
        var url=$(this).find('input').data('url');
        var type=$(this).data('type');
        if(type=='img'){
            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                area: '60%',
                skin: 'layui-layer-nobg', //没有背景色
                shadeClose: true,
                content: '<img src="'+url+'" style="width: 100%;">'
            });
        }else if(type=='pdf'){
            window.open(url, '_blank');
        }else if(type=='audio' || type=='video'){
            layer.open({
                type: 2,
                title: false,
                area: ['630px', '360px'],
                shade: 0.8,
                closeBtn: 0,
                shadeClose: true,
                content: url
            });
        }
    })
    //去除文件
    $("body").delegate('.del_file','click',function () {
        $(this).parent().remove();
        return false;
    })

    //获取地址了信息
    function getRequest() {
        var url = window.location.search; //获取url中"?"符后的字串
        var theRequest = new Object();
        if (url.indexOf("?") != -1) {
            var str = url.substr(1);
            strs = str.split("&");
            for(var i = 0; i < strs.length; i ++) {
                theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]);
            }
        }
        return theRequest;
    }

    //显示放大图
    $("body").delegate('.show_img','click',function () {
        var url=$(this).attr('src');
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            area: '60%',
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: '<img src="'+url+'" width="100%"/>'
        });
    })
    //文件上传
    layui.use(['upload','table'], function(){
        var $ = layui.jquery
            ,upload = layui.upload
            ,table =  layui.table;
        //多文件列表示例
        var demoListView = $('#demoList')
            ,uploadListIns = upload.render({
            elem: '#testList'
            ,url: '<?php echo url("Upload/file_images"); ?>'
            ,accept: 'file'
            ,multiple: true
            ,auto: false
            ,bindAction: '#testListAction'
            ,choose: function(obj){
                var files = obj.pushFile(); //将每次选择的文件追加到文件队列
                //读取本地文件
                obj.preview(function(index, file, result){
                    var tr = $(['<tr id="upload-'+ index +'">'
                        ,'<td>'+ file.name +'</td>'
                        ,'<td>'+ (file.size/1014).toFixed(1) +'kb</td>'
                        ,'<td>等待上传</td>'
                        ,'<td>'
                        ,'<button class="layui-btn layui-btn-mini demo-reload layui-hide">重传</button>'
                        ,'<button class="layui-btn layui-btn-mini layui-btn-danger demo-delete">删除</button>'
                        ,'</td>'
                        ,'</tr>'].join(''));

                    //单个重传
                    tr.find('.demo-reload').on('click', function(){
                        obj.upload(index, file);
                    });

                    //删除
                    tr.find('.demo-delete').on('click', function(){
                        delete files[index]; //删除对应的文件
                        tr.remove();
                    });

                    demoListView.append(tr);
                });
            }
            ,done: function(res, index, upload){
                if(res.code == 200){ //上传成功
                    var tr = demoListView.find('tr#upload-'+ index)
                        ,tds = tr.children();
                    tds.eq(2).html('<span style="color: #5FB878;">上传成功</span><input type="hidden" name="images['+index+']" value="'+res.data.src+'">');
                    tds.eq(3).html(''); //清空操作
                    delete files[index]; //删除文件队列已经上传成功的文件
                    return;
                }
                this.error(index, upload);
            }
            ,error: function(index, upload){
                var tr = demoListView.find('tr#upload-'+ index)
                    ,tds = tr.children();
                tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
                tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
            }
        });

        //普通图片上传 单图片上传
        var uploadInst = upload.render({
            elem: '#image'
            ,url: '<?php echo url("Upload/file_images"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#show_image').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                if(res.code == 400){
                    return layer.msg('上传失败');
                }
                $('.value_image').val(res.data.src);
                //上传成功
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
        //普通图片上传 单图片上传
        var uploadInst = upload.render({
            elem: '#image1'
            ,url: '<?php echo url("Upload/file_images"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#show_image1').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                if(res.code == 400){
                    return layer.msg('上传失败');
                }
                $('.value_image1').val(res.data.src);
                //上传成功
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText1');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
        //普通图片上传 单图片上传
        var uploadInst = upload.render({
            elem: '#image2'
            ,url: '<?php echo url("Upload/file_images"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#show_image2').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                if(res.code == 400){
                    return layer.msg('上传失败');
                }
                $('.value_image2').val(res.data.src);
                //上传成功
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText2');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });

        //选完文件后不自动上传--商品信息导入
        upload.render({
            elem: '#test8'
            ,url: '<?php echo url("Product/productInfo_excel"); ?>'
            ,auto: false
            ,accept: 'file' //普通文件
            ,exts: 'xls' //只允许上传压缩文件
            ,bindAction: '#test9'
            ,done: function(res){
                layer.msg(res.msg, {icon: 6,time: 1000});
                layer.open({
                    type: 2,
                    title: '商品导入信息审查',
                    shadeClose: true,
                    shade: false,
                    maxmin: true, //开启最大化最小化按钮
                    area: ['100%', '100%'],
                    content: '<?php echo url("Product/productList_excel"); ?>',
                    end:function () {
                        table.reload('testReload');
                    }
                });
            }
        });
    });
</script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        //路线描述内容信息
        var route_content = UE.getEditor('container_route',{initialFrameWidth: null});
        var content1 = UE.getEditor('content1',{initialFrameWidth: null});
        var content2 = UE.getEditor('content2',{initialFrameWidth: null});
        var content3 = UE.getEditor('content3',{initialFrameWidth: null});
        var content4 = UE.getEditor('content4',{initialFrameWidth: null});

        //路线概览
        var content_overview = UE.getEditor('content_overview',{initialFrameWidth: null});
        //路线概览
        var content_edition = UE.getEditor('content_edition',{initialFrameWidth: null});
        //路线特殊
        var content_feature = UE.getEditor('content_feature',{initialFrameWidth: null});

        var content10 = UE.getEditor('content10',{initialFrameWidth: null});
        var content11 = UE.getEditor('content11',{initialFrameWidth: null});
        var content12 = UE.getEditor('content12',{initialFrameWidth: null});
        var content13 = UE.getEditor('content13',{initialFrameWidth: null});
        var content14 = UE.getEditor('content14',{initialFrameWidth: null});
        var content15 = UE.getEditor('content15',{initialFrameWidth: null});
        var content16 = UE.getEditor('content16',{initialFrameWidth: null});
        var content17 = UE.getEditor('content17',{initialFrameWidth: null});
    </script>

<script>

    layui.use(['form','element','rate','table'], function() {
        var form = layui.form
            , layer = layui.layer
            , element = layui.element
            , laydate = layui.laydate
            , table = layui.table
            , rate = layui.rate;

        $("body").delegate('.del_content','click',function () {
           $(this).parents('.parent').remove();
        })

        $("body").delegate('.del_file','click',function () {
            $(this).parent().remove();
            return false;
        })

        //评分--体力强度
        rate.render({
            elem: '#start1'
            ,value: "<?php echo (isset($info['strength_number']) && ($info['strength_number'] !== '')?$info['strength_number']:'5'); ?>" //初始值
            ,choose: function(value){
                var that=this.elem;
                that.parents('.layui-input-inline').find('input[name="strength_number"]').val(value);
            }
        });

        //评分--文化强度
        rate.render({
            elem: '#start2'
            ,value: "<?php echo (isset($info['culture_number']) && ($info['culture_number'] !== '')?$info['culture_number']:'5'); ?>" //初始值
            ,choose: function(value){
                var that=this.elem;
                that.parents('.layui-input-inline').find('input[name="culture_number"]').val(value);
            }
        });

        //提交路线信息
        form.on('submit(submit_route)', function(data){
            console.log(data.field);
            $.post('<?php echo url("Route/ApiSaveRoute"); ?>',data.field,function (res) {
                if(res.code==200){
                    parent.layer.msg(res.msg, {icon: 6,time: 1000});
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index); //再执行关闭
                }else{
                    parent.layer.msg(res.msg, {icon: 6,time: 1000});
                }
            },'JSON')
        });

        //提交路线内容
        form.on('submit(submit_route_content)', function(data){
            data.field['content_overview']=content_overview.getContent();
            data.field['content_edition']=content_edition.getContent();
            data.field['content_feature']=content_feature.getContent();

            $.post('<?php echo url("Route/ApiSaveRouteContent"); ?>',data.field,function (res) {
                layer.msg(res.msg);
            },'JSON')
        });

        //提交注意事项
        form.on('submit(submit_zy)', function(data){
            data.field['content_xqts']=content1.getContent();
            data.field['content_bmwt']=content2.getContent();
            data.field['content_qtwt']=content3.getContent();
            data.field['content_faq']=content4.getContent();
            var route_id=$('input[name="route_id"]').val();
            data.field['route_id']=route_id;
                if(route_id.length==0){
                layer.msg('请先添加路线信息');
                return false;
            }
            $.post('<?php echo url("Route/ApiSaveRouteMatter"); ?>',data.field,function (res) {
                layer.msg(res.msg);
                table.reload('testReload');
            },'JSON')
        });

        //提交注意事项
        form.on('submit(submit_fy)', function(data){
            data.field['content_lxfy']=content10.getContent();
            data.field['content_yhzc']=content11.getContent();
            data.field['content_fybh']=content12.getContent();
            data.field['content_tkyz']=content13.getContent();
            data.field['content_cn']=content14.getContent();
            var route_id=$('input[name="route_id"]').val();
            data.field['route_id']=route_id;
            if(route_id.length==0){
                layer.msg('请先添加路线信息');
                return false;
            }
            $.post('<?php echo url("Route/ApiSaveRouteCost"); ?>',data.field,function (res) {
                layer.msg(res.msg);
                table.reload('testReload');
            },'JSON')
        });

        //提交行程助手
        form.on('submit(submit_zs)', function(data){
            data.field['content_xqzb']=content15.getContent();
            data.field['content_lxzz']=content16.getContent();
            data.field['content_xqts2']=content17.getContent();
            var route_id=$('input[name="route_id"]').val();
            data.field['route_id']=route_id;
            if(route_id.length==0){
                layer.msg('请先添加路线信息');
                return false;
            }
            $.post('<?php echo url("Route/ApiSaveRouteAssistant"); ?>',data.field,function (res) {
                layer.msg(res.msg);
                table.reload('testReload');
            },'JSON')
        });

        //获取区域信息
        $.get('<?php echo url("Route/ApiGetRegionPage"); ?>',{limit:100},function (res) {
            if(res.code==0){
                var data=res.data;
                var html='<option value="">选择区域</option>';
                var region_id="<?php echo (isset($info['region_id']) && ($info['region_id'] !== '')?$info['region_id']:''); ?>"
                $.each(data,function (k,v) {
                    if(region_id==v.region_id){
                        html+='<option value="'+v.region_id+'" selected>'+v.region_name+'</option>';
                    }else{
                        html+='<option value="'+v.region_id+'">'+v.region_name+'</option>';
                    }
                })
                $('select[name="region_id"]').html(html);
                form.render('select'); //刷新select选择框渲染
            }
        },'JSON')

        //获取片区信息
        $.get('<?php echo url("Route/ApiGetAreaPage"); ?>',{limit:100},function (res) {
            if(res.code==0){
                var data=res.data;
                var html='<option value="">选择片区</option>';
                var area_id="<?php echo (isset($info['area_id']) && ($info['area_id'] !== '')?$info['area_id']:''); ?>";
                $.each(data,function (k,v) {
                    if(area_id==v.area_id){
                        html+='<option value="'+v.area_id+'" selected>'+v.area_name+'</option>';
                    }else{
                        html+='<option value="'+v.area_id+'">'+v.area_name+'</option>';
                    }
                })
                $('select[name="area_id"]').html(html);
                form.render('select'); //刷新select选择框渲染
            }
        },'JSON')

        //获取洲信息
        var international_id="<?php echo (isset($info['international_id']) && ($info['international_id'] !== '')?$info['international_id']:''); ?>";
        $.get('<?php echo url("BaseInfo/ApiGetContinentList"); ?>',function (res) {
            if(res.code==200){
                var data=res.data;
                var html='<option value="">选择洲信息</option>';
                $.each(data,function (k,v) {
                    if(international_id==v.international_id){
                        html+='<option value="'+v.international_id+'" selected>'+v.name+'</option>';
                    }else {
                        html+='<option value="'+v.international_id+'">'+v.name+'</option>';
                    }
                })
                $('select[name="international_parent"]').html(html);
                form.render('select'); //刷新select选择框渲染
            }
        },'JSON')
        var country_id="<?php echo (isset($info['country_id']) && ($info['country_id'] !== '')?$info['country_id']:''); ?>";
        if(international_id>0){
            $.get('<?php echo url("BaseInfo/ApiGetCountryList"); ?>',{international_id:international_id},function (res) {
                if(res.code==200){
                    var data=res.data;
                    var html='<option value="">选择洲信息</option>';
                    $.each(data,function (k,v) {
                        if(country_id==v.international_id){
                            html+='<option value="'+v.international_id+'" selected>'+v.name+'</option>';
                        }else {
                            html+='<option value="'+v.international_id+'">'+v.name+'</option>';
                        }
                    })
                    $('select[name="international_id"]').html(html);
                    form.render('select'); //刷新select选择框渲染
                }
            },'JSON')
        }

        //监听下拉--国际洲
        form.on('select(international_parent)', function(data){
            //获取国家信息
            $.get('<?php echo url("BaseInfo/ApiGetCountryList"); ?>',{international_id:data.value},function (res) {
                if(res.code==200){
                    var data=res.data;
                    var html='<option value="">选择国家信息</option>';
                    $.each(data,function (k,v) {
                        if(country_id==v.country_id){
                            html+='<option value="'+v.international_id+'" selected>'+v.name+'</option>';
                        }else {
                            html+='<option value="'+v.international_id+'">'+v.name+'</option>';
                        }
                    })
                    $('select[name="international_id"]').html(html);
                    form.render('select'); //刷新select选择框渲染
                }
            },'JSON')
        });

        //获取主题信息
        $.get('<?php echo url("BaseInfo/ApiGetThemeList"); ?>',{limit:100},function (res) {
            var route_theme_id="<?php echo (isset($info['route_theme_id']) && ($info['route_theme_id'] !== '')?$info['route_theme_id']:''); ?>";
            if(res.code==0){
                var data=res.data;
                var html='';
                $.each(data,function (k,v) {
                    if(route_theme_id.indexOf(v.base_id)>=0){
                        html+='<input type="checkbox" value="'+v.base_id+'" title="'+v.value+'" name="route_theme_id['+v.base_id+']" title="'+v.value+'" checked>';
                    }else{
                        html+='<input type="checkbox" value="'+v.base_id+'" title="'+v.value+'" name="route_theme_id['+v.base_id+']" title="'+v.value+'">';
                    }
                })
                $('.theme_list').html(html);
                form.render(); //更新全部
            }
        },'JSON')

        //获取徽章信息
        $.get('<?php echo url("BaseInfo/ApiGetBadgeList"); ?>',{limit:100},function (res) {
            var badge_id="<?php echo (isset($info['badge_id']) && ($info['badge_id'] !== '')?$info['badge_id']:''); ?>";
            if(res.code==200){
                var data=res.data;
                var html='';
                $.each(data,function (k,v) {
                    if(badge_id.indexOf(v.badge_id)>=0){
                        html+='<input type="checkbox" value="'+v.badge_id+'" name="badge_id['+v.badge_id+']" title="'+v.badge_name+'" checked>';
                    }else{
                        html+='<input type="checkbox" value="'+v.badge_id+'" name="badge_id['+v.badge_id+']" title="'+v.badge_name+'">';
                    }
                })
                $('.badge_list').html(html);
                form.render(); //更新全部
            }
        },'JSON')

        //表格功能
        table.on('tool(demo_comment)', function(obj) {
            var data = obj.data;
            var event = obj.event;
            switch (event) {
                case 'edit':
                    layer.open({
                        type: 2,
                        title: '更新口碑',
                        shadeClose: true,
                        shade: false,
                        maxmin: true, //开启最大化最小化按钮
                        area: ['100%', '100%'],
                        content: '<?php echo url("Route/route_comment_save"); ?>?id=' + data.id+'&route_id='+data.route_id,
                        end: function () {
                            table.reload('testReload');
                        },
                    });
                    break;
            }
        })
        //表格功能
        table.on('tool(demo_trip)', function(obj){
            var data = obj.data;
            var event=obj.event;
            switch(event){
                case 'edit':
                    layer.open({
                        type: 2,
                        title: '更新行程',
                        shadeClose: true,
                        shade: false,
                        maxmin: true, //开启最大化最小化按钮
                        area: ['100%', '100%'],
                        content: '<?php echo url("Route/route_trip_save"); ?>?trip_id='+data.trip_id+'&route_id='+data.route_id,
                        end: function () {
                            console.log(111);
                            table.reload('testReload_trip');
                        },
                    });
                    break;
                case 'del':
                    layer.confirm('删除后无法恢复,确定删除么', function(index){
                        $.ajax({
                            url:'<?php echo url("Route/ApiDelRouteTrip"); ?>?trip_id='+data.trip_id+'&route_id='+data.route_id,
                            type:'get',
                            dataType:'json',
                            success:function(val){
                                if(val.code ==200){
                                    obj.del();
                                    layer.close(index);
                                }
                                if(val.code==400){
                                    layer.msg(val.msg);
                                }
                            }
                        });
                    });
                    break;
            }
        });

        //表格功能
        table.on('tool(demo_feature)', function(obj){
            var data = obj.data;
            var event=obj.event;
            switch(event){
                case 'edit':
                    layer.open({
                        type: 2,
                        title: '更新行程',
                        shadeClose: true,
                        shade: false,
                        maxmin: true, //开启最大化最小化按钮
                        area: ['100%', '100%'],
                        content: '<?php echo url("Route/route_feature_save"); ?>?feature_id='+data.feature_id+'&route_id='+data.route_id,
                        end: function () {
                            table.reload('testReload');
                        },
                    });
                    break;
                case 'del':
                    layer.confirm('删除后无法恢复,确定删除么', function(index){
                        $.ajax({
                            url:'<?php echo url("Route/ApiDelRouteFeature"); ?>?feature_id='+data.feature_id+'&route_id='+data.route_id,
                            type:'get',
                            dataType:'json',
                            success:function(val){
                                if(val.code ==200){
                                    obj.del();
                                    layer.close(index);
                                }
                                if(val.code==400){
                                    layer.msg(val.msg);
                                }
                            }
                        });
                    });
                    break;
            }
        });


        //选择相似路线
        $('.add_similar').click(function () {
            var checkStatus = table.checkStatus('Reload_list')
                ,data = checkStatus.data;
            if(data.length==0){
                layer.msg('请至少选择一个');
                return false;
            }
            var route_arr=[];
            $.each(data,function (k,v) {
                route_arr.push(v.route_id)
            })
            var route_id="<?php echo (isset($info['route_id']) && ($info['route_id'] !== '')?$info['route_id']:''); ?>";
            $.post('<?php echo url("Route/AddRouteSimilar"); ?>',{route_arr:route_arr,route_id:route_id},function (res) {
                if(res.code==200){
                    parent.layer.msg(res.msg, {icon: 6,time: 1000});
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index); //再执行关闭
                }else{
                    layer.msg(res.msg);
                }
            },"JSON")
        })

        $('.add_trip').click(function () {
            layer.open({
                type: 2,
                title: '信息更新',
                shadeClose: true,
                shade: false,
                maxmin: true, //开启最大化最小化按钮
                area: ['100%', '100%'],
                content: '<?php echo url("Route/route_trip_save"); ?>?route_id=<?php echo (isset($info["route_id"]) && ($info["route_id"] !== '')?$info["route_id"]:""); ?>',
                end: function () {
                    table.reload('testReload_trip');
                },
            });
        })
        form.render(); //刷新select选择框渲染

        $('.close').on('click',function () {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); //再执行关闭
        })
    })

</script>

