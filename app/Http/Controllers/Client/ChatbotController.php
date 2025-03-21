<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('components.chatbot');
    }

    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');

        // Lấy dữ liệu sản phẩm từ database
        $products = Product::all()->toArray();
        $productsJson = json_encode($products, JSON_PRETTY_PRINT);

        // Tạo prompt giới hạn phạm vi tư vấn
        $prompt = "Bạn là một chatbot tư vấn sản phẩm. Chỉ trả lời dựa trên thông tin sản phẩm sau đây: \n$productsJson\nNếu câu hỏi không liên quan đến sản phẩm, hãy trả lời: 'Tôi chỉ có thể tư vấn về sản phẩm trên trang web.'\nCâu hỏi từ người dùng: $userMessage";

        $client = new Client();
        $apiKey = config('services.gemini.api_key');
        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key={$apiKey}";

        try {
            $response = $client->post($url, [
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            $botReply = $data['candidates'][0]['content']['parts'][0]['text'];

            return response()->json(['reply' => $botReply]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $errorResponse = json_decode($e->getResponse()->getBody()->getContents(), true);
            return response()->json(['reply' => 'Có lỗi xảy ra: ' . $errorResponse['error']['message']], 500);
        } catch (\Exception $e) {
            return response()->json(['reply' => 'Có lỗi xảy ra: ' . $e->getMessage()], 500);
        }
    }
}
