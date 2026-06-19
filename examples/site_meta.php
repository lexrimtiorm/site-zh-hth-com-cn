<?php
/**
 * 站点元信息配置与描述生成器
 * 
 * 本文件包含站点元数据定义，并提供生成简短描述文本的方法。
 */

/**
 * 获取站点元信息配置数组
 *
 * @return array 站点元信息
 */
function getSiteMeta(): array
{
    return [
        'site_name' => '华体会官方站',
        'domain' => 'site-zh-hth.com.cn',
        'url' => 'https://site-zh-hth.com.cn',
        'keywords' => ['华体会', '体育', '娱乐'],
        'description' => '欢迎访问华体会官方平台，提供丰富的体育与娱乐资讯。',
        'language' => 'zh-CN',
        'charset' => 'UTF-8',
    ];
}

/**
 * 生成站点简短描述文本
 *
 * @param array $meta 站点元信息数组
 * @return string 描述文本
 */
function generateShortDescription(array $meta): string
{
    $name = $meta['site_name'] ?? '站点';
    $domain = $meta['domain'] ?? '';
    $keywords = $meta['keywords'] ?? [];
    $desc = $meta['description'] ?? '';

    $kwText = !empty($keywords) ? implode('、', $keywords) : '';

    $parts = [];
    $parts[] = $name;
    if ($kwText !== '') {
        $parts[] = '关键词：' . $kwText;
    }
    if ($domain !== '') {
        $parts[] = '域名：' . $domain;
    }
    if ($desc !== '') {
        $parts[] = '简介：' . $desc;
    }

    return implode(' | ', $parts);
}

/**
 * 获取格式化后的描述文本（含 HTML 转义）
 *
 * @param array $meta 站点元信息数组
 * @return string 转义后的描述文本
 */
function escapeShortDescription(array $meta): string
{
    $text = generateShortDescription($meta);
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

// ----- 示例用法（仅演示，不会自动执行）-----

/*
$meta = getSiteMeta();
echo generateShortDescription($meta) . "\n";
echo escapeShortDescription($meta) . "\n";
*/