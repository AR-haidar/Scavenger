<?php

namespace App\Http\Controllers;

use App\Models\GameScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        return view('user.quiz.game.index');
    }

    public function saveScore(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required|integer|min:0',
            'correct_answers' => 'required|integer|min:0',
            'wrong_answers' => 'required|integer|min:0'
        ]);

        $gameScore = GameScore::create([
            'user_id' => Auth::id(),
            'score' => $validated['score'],
            'correct_answers' => $validated['correct_answers'],
            'wrong_answers' => $validated['wrong_answers']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Score saved successfully',
            'data' => $gameScore
        ]);
    }

    public function leaderboard()
    {
        $topScores = GameScore::with('user')
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();

        return view('game.leaderboard', compact('topScores'));
    }
}