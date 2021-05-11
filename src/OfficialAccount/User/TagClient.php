<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) surpaimb <surpaimb@126.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Surpaimb\ByteDance\OfficialAccount\User;

use Surpaimb\ByteDance\Kernel\BaseClient;

/**
 * Class TagClient.
 *
 * @author surpaimb <surpaimb@126.com>
 */
class TagClient extends BaseClient
{
    /**
     * Create tag.
     *
     * @param string $name
     *
     * @return \Psr\Http\Message\ResponseInterface|\Surpaimb\ByteDance\Kernel\Support\Collection|array|object|string
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(string $name)
    {
        $params = [
            'tag' => ['name' => $name],
        ];

        return $this->httpPostJson('cgi-bin/tags/create', $params);
    }

    /**
     * List all tags.
     *
     * @return \Psr\Http\Message\ResponseInterface|\Surpaimb\ByteDance\Kernel\Support\Collection|array|object|string
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     */
    public function list()
    {
        return $this->httpGet('cgi-bin/tags/get');
    }

    /**
     * Update a tag name.
     *
     * @param int    $tagId
     * @param string $name
     *
     * @return \Psr\Http\Message\ResponseInterface|\Surpaimb\ByteDance\Kernel\Support\Collection|array|object|string
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(int $tagId, string $name)
    {
        $params = [
            'tag' => [
                'id' => $tagId,
                'name' => $name,
            ],
        ];

        return $this->httpPostJson('cgi-bin/tags/update', $params);
    }

    /**
     * Delete tag.
     *
     * @param int $tagId
     *
     * @return \Psr\Http\Message\ResponseInterface|\Surpaimb\ByteDance\Kernel\Support\Collection|array|object|string
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(int $tagId)
    {
        $params = [
            'tag' => ['id' => $tagId],
        ];

        return $this->httpPostJson('cgi-bin/tags/delete', $params);
    }

    /**
     * Get user tags.
     *
     * @param string $openid
     *
     * @return \Psr\Http\Message\ResponseInterface|\Surpaimb\ByteDance\Kernel\Support\Collection|array|object|string
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function userTags(string $openid)
    {
        $params = ['openid' => $openid];

        return $this->httpPostJson('cgi-bin/tags/getidlist', $params);
    }

    /**
     * Get users from a tag.
     *
     * @param int    $tagId
     * @param string $nextOpenId
     *
     * @return \Psr\Http\Message\ResponseInterface|\Surpaimb\ByteDance\Kernel\Support\Collection|array|object|string
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function usersOfTag(int $tagId, string $nextOpenId = '')
    {
        $params = [
            'tagid' => $tagId,
            'next_openid' => $nextOpenId,
        ];

        return $this->httpPostJson('cgi-bin/user/tag/get', $params);
    }

    /**
     * Batch tag users.
     *
     * @param array $openids
     * @param int   $tagId
     *
     * @return \Psr\Http\Message\ResponseInterface|\Surpaimb\ByteDance\Kernel\Support\Collection|array|object|string
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tagUsers(array $openids, int $tagId)
    {
        $params = [
            'openid_list' => $openids,
            'tagid' => $tagId,
        ];

        return $this->httpPostJson('cgi-bin/tags/members/batchtagging', $params);
    }

    /**
     * Untag users from a tag.
     *
     * @param array $openids
     * @param int   $tagId
     *
     * @return \Psr\Http\Message\ResponseInterface|\Surpaimb\ByteDance\Kernel\Support\Collection|array|object|string
     *
     * @throws \Surpaimb\ByteDance\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function untagUsers(array $openids, int $tagId)
    {
        $params = [
            'openid_list' => $openids,
            'tagid' => $tagId,
        ];

        return $this->httpPostJson('cgi-bin/tags/members/batchuntagging', $params);
    }
}
