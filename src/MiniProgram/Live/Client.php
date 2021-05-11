<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) surpaimb <surpaimb@126.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Surpaimb\ByteDance\MiniProgram\Live;

use Surpaimb\ByteDance\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author onekb <1@1kb.ren>
 */
class Client extends BaseClient
{
    /**
     * Get Room List.
     *
     * @param int $start
     * @param int $limit
     *
     * @return array|\Surpaimb\ByteDance\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @deprecated This method has been merged into `\Surpaimb\ByteDance\MiniProgram\Broadcast`
     */
    public function getRooms(int $start = 0, int $limit = 10)
    {
        $params = [
            'start' => $start,
            'limit' => $limit,
        ];

        return $this->httpPostJson('wxa/business/getliveinfo', $params);
    }

    /**
     * Get Playback List.
     *
     * @param int $roomId
     * @param int $start
     * @param int $limit
     *
     * @return array|\Surpaimb\ByteDance\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @deprecated This method has been merged into `\Surpaimb\ByteDance\MiniProgram\Broadcast`
     */
    public function getPlaybacks(int $roomId, int $start = 0, int $limit = 10)
    {
        $params = [
            'action' => 'get_replay',
            'room_id' => $roomId,
            'start' => $start,
            'limit' => $limit,
        ];

        return $this->httpPostJson('wxa/business/getliveinfo', $params);
    }
}