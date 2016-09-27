<?php

namespace Gentor\Intercom;


use GuzzleHttp\Exception\ClientException;
use Intercom\IntercomClient;

/**
 * Class IntercomService
 *
 * @package Gentor\Intercom
 */
class IntercomService
{
    /**
     * @var \Intercom\IntercomClient
     */
    public $client;

    /**
     * IntercomService constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->client = new IntercomClient($config['app_id'], $config['api_key']);
    }

    /**
     * @param       $method
     * @param array $args
     *
     * @return mixed
     */
    public function __call($method, array $args)
    {
        return $this->client->{$method};
    }

    /**
     * @param array $options
     *
     * @return null
     * @throws \GuzzleHttp\Exception\ClientException
     */
    public function getUser(array $options)
    {
        try {
            $user = $this->client->users->getUsers($options);
        } catch (ClientException $e) {
            if ($e->getCode() == 404) {
                $user = null;
            } else {
                throw $e;
            }
        }

        return $user;
    }

    /**
     * @return mixed
     */
    public function getAllUsers()
    {
        return $this->client->users->getUsers([]);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function createUser(array $data)
    {
        return $this->client->users->create($data);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function editUser(array $data)
    {
        return $this->client->users->create($data);
    }

    /**
     * @param       $id
     *
     * @param array $options
     *
     * @return mixed
     */
    public function deleteUser($id, $options = [])
    {
        return $this->client->users->deleteUser($id, $options);
    }

    /**
     * @param $user_id
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\ClientException
     */
    public function deleteUserByUserId($user_id)
    {
        try {
            $user = $this->deleteUser(null, ['user_id' => $user_id]);
        } catch (ClientException $e) {
            if ($e->getCode() == 404) {
                $user = null;
            } else {
                throw $e;
            }
        }

        return $user;
    }

}