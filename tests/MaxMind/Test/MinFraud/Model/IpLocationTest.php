<?php

namespace MaxMind\Test\MinFraud\Model;

use MaxMind\MinFraud\Model\IpAddress;

/**
 * @coversNothing
 */
class IpLocationTest extends \PHPUnit_Framework_TestCase
{
    public function testIpAddress()
    {
        $array = [
            'risk' => 0.01,
            'country' => [
                'iso_code' => 'US',
                'is_high_risk' => false,
            ],
            'location' => [
                'local_time' => '2015-04-12T18:51:19-01:00',
                'accuracy_radius' => 5,
            ],
            'postal' => [
                'code' => '31432',
            ],
        ];

        $ipAddress = new IpAddress($array);

        $this->assertSame(
            $array['risk'],
            $ipAddress->risk,
            'IP risk'
        );

        $this->assertSame(
            $array['country']['iso_code'],
            $ipAddress->country->isoCode,
            'ISO code'
        );

        $this->assertSame(
            $array['country']['is_high_risk'],
            $ipAddress->country->isHighRisk,
            'country is not high risk'
        );

        $this->assertSame(
            $array['location']['local_time'],
            $ipAddress->location->localTime,
            'local time'
        );

        $this->assertSame(
            $array['location']['accuracy_radius'],
            $ipAddress->location->accuracyRadius,
            'accuracy radius'
        );

        $this->assertSame(
            $array['postal']['code'],
            $ipAddress->postal->code,
            'postal code'
        );

        $this->assertSame(
            $array,
            $ipAddress->jsonSerialize(),
            'correctly implements JsonSerializable'
        );
    }
}
