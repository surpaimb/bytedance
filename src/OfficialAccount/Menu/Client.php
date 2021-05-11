<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) surpaimb <surpaimb@126.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Surpaimb\ByteDance\OfficialAccount\Menu;

use Surpaimb\ByteDance\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author surpaimb <surpaimb@126.com>
 */
class Client extends BaseClient
{
    /**
     * Get all menus.
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     */
    public function list()
    {
        return $this->httpGet('cgi-bin/menu/get');
    }

    /**
     * Get current menus.
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     */
    public function current()
    {
        return $this->httpGet('cgi-bin/get_current_selfmenu_info');
    }

    /**
     * Add menu.
     *
     * @param array $buttons
     * @param array $matchRule
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $buttons, array $matchRule = [])
    {
        if (!empty($matchRule)) {
            return $this->httpPostJson('cgi-bin/menu/addconditional', [
                'button' => $buttons,
                'matchrule' => $matchRule,
            ]);
        }

        return $this->httpPostJson('cgi-bin/menu/create', ['button' => $buttons]);
    }

    /**
     * Destroy menu.
     *
     * @param int $menuId
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(int $menuId = null)
    {
        if (is_null($menuId)) {
            return $this->httpGet('cgi-bin/menu/delete');
        }

        return $this->httpPostJson('cgi-bin/menu/delconditional', ['menuid' => $menuId]);
    }

    /**
     * Test conditional menu.
     *
     * @param string $userId
     *
     * @return mixed
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function match(string $userId)
    {
        return $this->httpPostJson('cgi-bin/menu/trymatch', ['user_id' => $userId]);
    }
}