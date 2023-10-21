<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class YourApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api/user'); // เปลี่ยนเส้นทาง API endpoint ตามที่คุณต้องการทดสอบ

        $response->assertStatus(200); // ตรวจสอบว่าการร้องขอสำเร็จและส่งกลับรหัสสถานะ 200 OK
    }
}
