<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) surpaimb <surpaimb@126.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Surpaimb\ByteDance\MiniProgram;

use Surpaimb\ByteDance\BasicService;
use Surpaimb\ByteDance\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 *
 * @property \Surpaimb\ByteDance\MiniProgram\Auth\AccessToken           $access_token
 * @property \Surpaimb\ByteDance\MiniProgram\DataCube\Client            $data_cube
 * @property \Surpaimb\ByteDance\MiniProgram\AppCode\Client             $app_code
 * @property \Surpaimb\ByteDance\MiniProgram\Auth\Client                $auth
 * @property \Surpaimb\ByteDance\OfficialAccount\Server\Guard           $server
 * @property \Surpaimb\ByteDance\MiniProgram\Encryptor                  $encryptor
 * @property \Surpaimb\ByteDance\MiniProgram\TemplateMessage\Client     $template_message
 * @property \Surpaimb\ByteDance\OfficialAccount\CustomerService\Client $customer_service
 * @property \Surpaimb\ByteDance\MiniProgram\Plugin\Client              $plugin
 * @property \Surpaimb\ByteDance\MiniProgram\Plugin\DevClient           $plugin_dev
 * @property \Surpaimb\ByteDance\MiniProgram\UniformMessage\Client      $uniform_message
 * @property \Surpaimb\ByteDance\MiniProgram\ActivityMessage\Client     $activity_message
 * @property \Surpaimb\ByteDance\MiniProgram\Express\Client             $logistics
 * @property \Surpaimb\ByteDance\MiniProgram\NearbyPoi\Client           $nearby_poi
 * @property \Surpaimb\ByteDance\MiniProgram\OCR\Client                 $ocr
 * @property \Surpaimb\ByteDance\MiniProgram\Soter\Client               $soter
 * @property \Surpaimb\ByteDance\BasicService\Media\Client              $media
 * @property \Surpaimb\ByteDance\BasicService\ContentSecurity\Client    $content_security
 * @property \Surpaimb\ByteDance\MiniProgram\Mall\ForwardsMall          $mall
 * @property \Surpaimb\ByteDance\MiniProgram\SubscribeMessage\Client    $subscribe_message
 * @property \Surpaimb\ByteDance\MiniProgram\RealtimeLog\Client         $realtime_log
 * @property \Surpaimb\ByteDance\MiniProgram\Search\Client              $search
 * @property \Surpaimb\ByteDance\MiniProgram\Live\Client                $live
 * @property \Surpaimb\ByteDance\MiniProgram\Broadcast\Client           $broadcast
 * @property \Surpaimb\ByteDance\MiniProgram\UrlScheme\Client           $url_scheme
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        DataCube\ServiceProvider::class,
        AppCode\ServiceProvider::class,
        Server\ServiceProvider::class,
        TemplateMessage\ServiceProvider::class,
        CustomerService\ServiceProvider::class,
        UniformMessage\ServiceProvider::class,
        ActivityMessage\ServiceProvider::class,
        OpenData\ServiceProvider::class,
        Plugin\ServiceProvider::class,
        Base\ServiceProvider::class,
        Express\ServiceProvider::class,
        NearbyPoi\ServiceProvider::class,
        OCR\ServiceProvider::class,
        Soter\ServiceProvider::class,
        Mall\ServiceProvider::class,
        SubscribeMessage\ServiceProvider::class,
        RealtimeLog\ServiceProvider::class,
        Search\ServiceProvider::class,
        Live\ServiceProvider::class,
        Broadcast\ServiceProvider::class,
        UrlScheme\ServiceProvider::class,
        Payment\ServiceProvider::class,
        // Base services
        BasicService\Media\ServiceProvider::class,
        BasicService\ContentSecurity\ServiceProvider::class,
        Content\ServiceProvider::class,
    ];

    /**
     * Handle dynamic calls.
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        return $this->base->$method(...$args);
    }
}
