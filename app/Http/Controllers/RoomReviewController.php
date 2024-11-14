<?php

namespace App\Http\Controllers;

use App\Models\RoomReview;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'string|required',
            'description' => 'required',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,svg,webp,avif|max:2048|nullable',
            'room_id' => 'required|exists:rooms,id',
            'transaction_id' => 'required|exists:transactions,id',
            'rating_text' => 'required|string'
        ]);



        $rating_text = $data['rating_text'];
        $rating = 0;
        switch ($rating_text) {
            case 'Buruk':
                $rating = 1;
                break;
            case 'Lumayan':
                $rating = 2;
                break;
            case 'Bagus':
                $rating = 3;
                break;
            case 'Sangat Bagus':
                $rating = 4;
                break;
            case 'Sempurna':
                $rating = 5;
                break;

            default:
                $rating = 0;
                break;
        }

        // $images = [];
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $image) {
        //         $path = $image->store('review-images', 'public');
        //         $images[] = $path;
        //     }
        // }
        $roomReview = new RoomReview();
        $roomReview->title = $data['title'];
        $roomReview->description = $data['description'];
        $roomReview->rating = $rating;
        $roomReview->rating_text = $rating_text;
        $roomReview->user_id = Auth::user()->id;
        $roomReview->room_id = $data['room_id'];
        $roomReview->transaction_id = $data['transaction_id'];

        // dd($roomReview);
        $roomReview->save();
        $transaction = Transaction::where('id', $roomReview->transaction->id)->firstOrFail();
        return redirect()->route('dashboard.user.bookings.detail', $transaction->invoice);
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomReview $roomReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomReview $roomReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomReview $roomReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomReview $roomReview)
    {
        //
    }
}