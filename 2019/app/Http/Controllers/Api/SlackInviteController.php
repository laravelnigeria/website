<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Darovi\LaravelSlackInvite\Slack;
use App\Http\Controllers\Controller;

final class SlackInviteController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate(['email' => 'required|email']);

        return response()->json(
            json_decode(Slack::invite($data['email']), true)
        );
    }
}
