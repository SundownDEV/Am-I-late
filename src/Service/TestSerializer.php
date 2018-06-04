<?php
/**
 * Created by PhpStorm.
 * User: sundowndev
 * Date: 30/05/18
 * Time: 16:31
 */

namespace App\Service;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class TestSerializer
{
    public function test ($data, Serializer $serializer)
    {
        return $serializer->denormalize($data);
    }
}