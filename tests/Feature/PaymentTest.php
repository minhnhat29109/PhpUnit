<?php

namespace Tests\Feature;

use App\Http\Controllers\Payment;
use App\Http\Controllers\ReflectionTest;
use AuthorizeNetAIM;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use stdClass;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    public function testProcessPaymentReturnsTrueOnSuccessfulPayment()
    {
        $paymentDetails = array(
            'amount'   => 123.99,
            'card_num' => '4111-1111-1111-1111',
            'exp_date' => '03/2013',
        );

        $payment = new Payment();
        $response = new stdClass();
        $response->approved = true;
        $response->transaction_id = 123;

        // $authorizeNet = new AuthorizeNetAIM(Payment::API_ID, Payment::TRANS_KEY);
        $authorizeNet = $this->getMockBuilder(AuthorizeNetAIM::class) // Tao class ao. cac object deu tra ve null
        ->setConstructorArgs([Payment::API_ID, Payment::TRANS_KEY])
        ->getMock();
        // dd($authorizeNet);
        $authorizeNet->expects($this->once())   // authorizeNet goi method authorizeAndCapture =>  authorizeAndCapture tra ve gtri ($response)
        ->method('authorizeAndCapture')      // once(): goi method 1 lan      any(): goi method nhieu lan  never(): Khong goi
        ->will($this->returnValue($response));

        $result = $payment->processPayment($authorizeNet, $paymentDetails);

        $this->assertTrue($result);
        $this->assertTrue(true);

    }
   
}
