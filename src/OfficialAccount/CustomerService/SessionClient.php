<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) surpaimb <surpaimb@126.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Surpaimb\ByteDance\OfficialAccount\CustomerService;

use Surpaimb\ByteDance\Kernel\BaseClient;

/**
 * Class SessionClient.
 *
 * @author surpaimb <surpaimb@126.com>
 */
class SessionClient extends BaseClient
{
    /**
     * List all sessions of $account.
     *
     * @param string $account
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     */
    public function list(string $account)
    {
        return $this->httpGet('customservice/kfsession/getsessionlist', ['kf_account' => $account]);
    }

    /**
     * List all the people waiting.
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     */
    public function waiting()
    {
        return $this->httpGet('customservice/kfsession/getwaitcase');
    }

    /**
     * Create a session.
     *
     * @param string $account
     * @param string $openid
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(string $account, string $openid)
    {
        $params = [
            'kf_account' => $account,
            'openid' => $openid,
        ];

        return $this->httpPostJson('customservice/kfsession/create', $params);
    }

    /**
     * Close a session.
     *
     * @param string $account
     * @param string $openid
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function close(string $account, string $openid)
    {
        $params = [
            'kf_account' => $account,
            'openid' => $openid,
        ];

        return $this->httpPostJson('customservice/kfsession/close', $params);
    }

    /**
     * Get a session.
     *
     * @param string $openid
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     */
    public function get(string $openid)
    {
        return $this->httpGet('customservice/kfsession/getsession', ['openid' => $openid]);
    }
}