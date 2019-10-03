<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Ip;
use App\Entity\Subnet;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setApiKey('test_api_key');
        $user->setUsername('test');
        $user->setPassword('test');
        $manager->persist($user);
        $manager->flush();


        $test_vals = json_decode('[
	{
		"subnet": "198.178.91.0",
		"cidr": 28,
		"ips": [
			{
				"ip": "198.178.91.0",
				"address_tag": "<eq_03_xnbwb_4_mgmt_ip>"
			},
			{
				"ip": "198.178.91.1",
				"address_tag": "<opz_xd_5_primary_uplink_netwk_ip>>"
			},
			{
				"ip": "198.178.91.2",
				"address_tag": "<opz_xd_5_primary_uplink_broadcast_ip>"
			},
			{
				"ip": "198.178.91.3",
				"address_tag": "<opz_xd_5_secondary_uplink_netwk_ip>"
			},
			{
				"ip": "198.178.91.4",
				"address_tag": "<zb500_opz_xd_5_secondary_uplink_ip>"
			},
			{
				"ip": "198.178.91.5",
				"address_tag": "<opz_xd_02_opz_xd_5_secondary_uplink_ip>"
			},
			{
				"ip": "198.178.91.6",
				"address_tag": "<opz_xd_5_secondary_uplink_broadcast_ip>"
			},
			{
				"ip": "198.178.91.7",
				"address_tag": "<opz_telemetry_broadcast_ip>"
			},
			{
				"ip": "198.178.91.8",
				"address_tag": "<opz_opz_oam_uplink_vip_ip>"
			},
			{
				"ip": "198.178.91.9",
				"address_tag": "<zb500_02_opz_oam_uplink_ip>"
			},
			{
				"ip": "198.178.91.10",
				"address_tag": "<zb500_01_opz_oam_uplink_ip>"
			},
			{
				"ip": "198.178.91.11",
				"address_tag": "<zb500_opz_oam_uplink_vip_ip>"
			},
			{
				"ip": "198.178.91.12",
				"address_tag": "<opz_telemetry_netwk_ip>"
			},
			{
				"ip": "198.178.91.13",
				"address_tag": "<opz_telemetry_broadcast_ip>"
			},
			{
				"ip": "198.178.91.14",
				"address_tag": "<opz_telemetry_default_gateway_ip>"
			},
			{
				"ip": "198.178.91.15",
				"address_tag": "<eq_03_mgmt_ip>"
			}
		]
	},
	{
		"subnet": "198.178.92.0",
		"cidr": 30,
		"ips": [
			{
				"ip": "198.178.92.0",
				"address_tag": "<zb500_primary_opz_untrust_ibgp_ip>"
			},
			{
				"ip": "198.178.92.1",
				"address_tag": "<opz_untrust_ibgp_netwk_ip>"
			},
			{
				"ip": "198.178.92.2",
				"address_tag": "<zb500_secondary_opz_untrust_ibgp_ip>"
			},
			{
				"ip": "198.178.92.3",
				"address_tag": "<opz_untrust_ibgp_broadcast_ip>"
			}
		]
	},
	{
		"subnet": "198.178.93.0",
		"cidr": 29,
		"ips": [
			{
				"ip": "198.178.93.0",
				"address_tag": "<zb500_02_mgmt_re1_ip>"
			},
			{
				"ip": "198.178.93.1",
				"address_tag": "<zb500_02_mgmt_re0_ip>"
			},
			{
				"ip": "198.178.93.2",
				"address_tag": "<zb500_02_mgmt_vip_ip>"
			},
			{
				"ip": "198.178.93.3",
				"address_tag": "<zb500_01_mgmt_re1_ip>"
			},
			{
				"ip": "198.178.93.4",
				"address_tag": "<zb500_01_mgmt_re0_ip>"
			},
			{
				"ip": "198.178.93.5",
				"address_tag": "<zb500_01_mgmt_vip_ip>"
			},
			{
				"ip": "198.178.93.6",
				"address_tag": "<opz_telemetry_netwk_ip>"
			},
			{
				"ip": "198.178.93.7",
				"address_tag": "<xnbwb_5_mgmt_broadcast_ip>"
			}
		]
	}
]',true);


        foreach($test_vals as $net){
            $subnet = new Subnet();
            $subnet->setSubnet($net['subnet']);
            $subnet->setCidr($net['cidr']);

            $manager->persist($subnet);

            foreach($net['ips'] as $ip_ip){
                $ip = new Ip();
                $ip->setIp($ip_ip['ip']);
                $ip->setAddressTag($ip_ip['address_tag']);
                $ip->setSubnet($subnet);
                $manager->persist($ip);
            }
        }
        $manager->flush();
    }
}
