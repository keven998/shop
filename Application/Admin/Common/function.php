<?php
/**
 * 管理员操作记录
 * @param $log_url 操作URL
 * @param $log_info 记录信息
 */
function adminLog($log_info, $log_type=1){
    $data = array(
        'admin_id' => session('admin.user_id'),
        'log_info' => $log_info,
        'log_ip' => get_client_ip(),
        'log_time' => $_SERVER['REQUEST_TIME'],
        'log_type' => $log_type
    );
    M('admin_log')->add($data);
}

/**
 * 递归重组节点信息为多维数组
 * @param [type] $node  [要处理的节点数组]
 * @param integer $pid  [父级id]
 * @param [type] 
 */
function node_merge($node,$access = null, $pid =0){
    $arr = array();
    foreach($node as $val){
        if(is_array($access)){
            $val['access'] = in_array($val['id'], $access) ? 1 : 0;
        }
        if($val['pid'] == $pid){
            $val['child'] = node_merge($node, $access, $val['id']);
            $arr[] = $val;
        }
    }
    return $arr;
}


/**
 * 菜单组合一维数组
 * @param  [type]  $cate       [description]
 * @param  string  $html       [description]
 * @param  integer $parent_id  [description]
 * @param  integer $level      [description]
 * @param  string  $current_id [description]
 * @return [type]              [description]
 */
function cateForLevel($cate,$html= '----', $parent_id=0, $level = 0, $current_id = ''){
    $arr = array();
    foreach($cate as $val){
        if($val['parent_id'] == $parent_id && $val['cat_id'] != $current_id){
            $val['level'] = $level + 1;
            $val['html'] = str_repeat($html, $level);
            $arr[] = $val;
            $arr = array_merge($arr,cateForLevel($cate, $html, $val['cat_id'], $level+1, $current_id));
        }
    }
    return $arr;
}



// 写入配置文件
function toConf($name, $value='', $path=CONF_PATH) {
    static $_cache = array();
    $filename = $path . $name . '.php';
    if ('' !== $value) {
        if (is_null($value)) {
            // 删除缓存
            return unlink($filename);
        } else {
            // 缓存数据
            $dir = dirname($filename);
            // 目录不存在则创建
            if (!is_dir($dir)) mkdir($dir);
            $_cache[$name] = $value;
            return file_put_contents($filename, strip_whitespace("<?php\nreturn " . var_export($_cache, true) . ";\n?>"));
        }
    }
    if (isset($_cache[$name]))
        return $_cache[$name];
    // 获取缓存数据
    if (is_file($filename)) {
        $value = include $filename;
        $_cache[$name] = $value;
    } else {
        $value = false;
    }
    return $value;
}

/**
 * +----------------------------------------------------------
 * 判断别名是否规范
 * +----------------------------------------------------------
 */
function is_unique_id($unique) {
    if (preg_match("/^[a-zA-Z0-9-]+$/", $unique)) {
        return true;
    }
}

/**
 * +----------------------------------------------------------
 * 判断用户名是否规范
 * +----------------------------------------------------------
 */
function is_username($username) {
    if (preg_match("/^[a-zA-Z]{1}([0-9a-zA-Z]|[._]){3,19}$/", $username)) {
        return true;
    }
}

/**
 * 判断密码是否规范
 */
function is_password($password) {
    if (preg_match("/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,22}$/", $password)) {
        return true;
    }
}

/**
 * @param $arr
 * @param $key_name
  * @param $key_name2
 * @return array
 * 将数据库中查出的列表以指定的 id 作为数组的键名 数组指定列为元素 的一个数组
 */
function get_id_val($arr, $key_name,$key_name2)
{
    $arr2 = array();
    foreach($arr as $key => $val){
        $arr2[$val[$key_name]] = $val[$key_name2];
    }
    return $arr2;
}


// 菜单组合一维数组
function menuForLevel($menu,$html= '----', $pid=0, $level = 0){
    $arr = array();
    foreach($menu as $val){
        if($val['pid'] == $pid){
            $val['level'] = $level + 1;
            $val['html'] = str_repeat($html, $level);
            $arr[] = $val;
            $arr = array_merge($arr,menuForLevel($menu, $html, $val['id'], $level+1));
        }
    }
    return $arr;
}

//菜单组合多维数组
function menuForLayer($menu, $name = 'child', $pid = 0){
    $arr = array();
    foreach ($menu as $val) {
        $val['name'] = urlencode($val['name']);
        if($val['pid'] == $pid){
            $val[$name] = menuForLayer($menu, $name, $val['id']);
            $arr[] = $val;
        }
    }
    return $arr;
}

/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function format_bytes($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}


/**
 * 根据id获取地区名字
 * @param $regionId id
 */
function getRegionName($regionId){
    $data = M('region')->where(array('id'=>$regionId))->field('name')->find();
    return $data['name'];
}



/**
 * 导出excel
 * @param $strTable 表格内容
 * @param $filename 文件名
 */
function downloadExcel($strTable,$filename)
{
    header("Content-type: application/vnd.ms-excel");
    header("Content-Type: application/force-download");
    header("Content-Disposition: attachment; filename=".$filename."_".date('Y-m-d').".xls");
    header('Expires:0');
    header('Pragma:public');
    echo '<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.$strTable.'</html>';
}



/**
 * 返回星期
 * @param $n
 */
function week($n){
    switch ($n){
        case 1:
            return '星期一';
            break;
        case 2:
            return '星期二';
            break;
        case 3:
            return '星期三';
            break;
        case 4:
            return '星期四';
            break;
        case 5:
            return '星期五';
            break;
        case 6:
            return '星期六';
            break;
        case 7:
            return '星期日';
            break;
    }
}
















?>