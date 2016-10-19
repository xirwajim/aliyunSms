<?php

return [

    /*
     * Debug 模式，bool 值：true/false
     *
     * 当值为 false 时，所有的日志都不会记录
     */
    'debug' => true,

    /*
     * 使用 Laravel 的缓存系统
     */
    'use_laravel_cache' => true,

    /*
     * 账号基本信息，请从微信公众平台/开放平台获取
     */
    'template_code' => env('WECHAT_APPID', 'your-app-id'),         // 模板code
    'template_param' => env('WECHAT_APPID', 'your-app-id'),         // 模板变量
    'sign_name' => env('WECHAT_TOKEN', 'your-token'),          // 签名名称

    'aes_key' => env('WECHAT_AES_KEY', ''),                    // EncodingAESKey
    'secret' => env('WECHAT_SECRET', 'your-app-secret'),     // AppSecret
    /*
     * 日志配置
     *
     * level: 日志级别，可选为：
     *                 debug/info/notice/warning/error/critical/alert/emergency
     * file：日志文件位置(绝对路径!!!)，要求可写权限
     */
    'log' => [
        'level' => env('WECHAT_LOG_LEVEL', 'debug'),
        'file' => env('WECHAT_LOG_FILE', storage_path('logs/wechat.log')),
    ],



];
