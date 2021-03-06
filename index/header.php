<?php
error_reporting(0);
$header = json_decode('[
  {
    "name": "首页",
    "url": "//ouyangpeng.top/",
    "active": true
  },
  {
    "name": "应用",
    "children": [
      {
        "name": "My Pages",
        "url": "http://i.ouyangpeng.top/mypages/",
        "target": "_blank"
      },
      {
        "name": "无忧音乐",
        "url": "http://i.ouyangpeng.top/wbqyy/",
        "target": "_blank"
      },
      {
          "name": "鹏创书刊",
          "url": "http://i.ouyangpeng.top/books/",
          "target": "_blank"
      },
      {
          "name": "模拟请求",
          "url": "http://i.ouyangpeng.top/mnqq/",
          "target": "_blank"
      },
      {
          "name": "鹏创图床",
          "url": "http://i.ouyangpeng.top/tuchuang/",
          "target": "_blank"
      }
    ]
  },
  {
    "name": "Github",
    "url": "https://github.com/oyps",
    "icon": "//ouyangpeng.top/source/image/github-brands.svg",
    "target": "_blank"
  },
  {
    "name": "关注我",
    "children": [
      {
        "name": "微博",
        "url": "https://weibo.com/ponconsoft",
        "icon": "//ouyangpeng.top/source/image/weibo-brands.svg",
        "target": "_blank"
      },
      {
        "name": "知乎",
        "url": "https://www.zhihu.com/people/ponconsoft",
        "icon": "//ouyangpeng.top/source/image/zhihu.png",
        "target": "_blank"
      },
      {
        "name": "交流群",
        "url": "https://jq.qq.com/?_wv=1027&k=PQuZNehB",
        "icon": "//ouyangpeng.top/source/image/qq-brands.svg",
        "target": "_blank"
      },
      {
        "name": "V2EX",
        "url": "https://www.v2ex.com/member/oyp",
        "icon": "//ouyangpeng.top/source/image/v2ex.png",
        "target": "_blank"
      },
      {
        "name": "关于",
        "url": "//ouyangpeng.top/#about",
        "icon": "//ouyangpeng.top/source/image/circle-info-solid.svg"
      }
    ]
  }
]', true);
echo '
<nav class="navbar navbar-light bg-light navbar-expand-sm shadow-sm fixed-top user-select-none">
    <a class="navbar-brand" href="//ouyangpeng.top/">
        鹏优创
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">';
foreach ($header as $value) {
  if (isset($value['children'])) {
    $children = '';
    foreach ($value['children'] as $v) {
      $children .= '<a class="dropdown-item" href="' . $v['url'] . '" ' . (isset($v['target']) ? 'target="' . $v['target'] . '"' : '') . '>' . (isset($v['icon']) ? '<img referrerPolicy="no-referrer" src="' . $v['icon'] . '" alt="' . $v['name'] . '" class="d-inline-block mr-2 align-middle" style="height: 1em;"><span class="align-middle">' : '<span>') . $v['name'] . '</span></a>';
    }
    echo '
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
                    ' . $value['name'] . '
                </a>
                <div class="dropdown-menu shadow">
                    ' . $children . '
                </div>
            </li>';
  } else {
    echo '
            <li class="nav-item ' . (isset($value['active']) ? 'active' : '') . '">
                <a class="nav-link" href="' . $value['url'] . '" ' . (isset($value['target']) ? 'target="' . $value['target'] . '"' : '') . '>' . (isset($value['icon']) ? '<img referrerPolicy="no-referrer" src="' . $value['icon'] . '" alt="' . $v['name'] . '" class="d-inline-block mr-1 mb-1" style="height: 1em;">' : '')  . $value['name'] . '</a>
            </li>';
  }
}
echo '
        </ul>
    </div>
</nav>
<script>
    document.querySelector(\'body\').style.paddingTop = document.querySelector(\'.navbar\').offsetHeight + \'px\'
</script>
';
