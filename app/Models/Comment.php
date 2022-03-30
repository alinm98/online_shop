<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function average($count): array
    {
        $data['quality'] = 0;
        $data['worth'] = 0;
        $data['design'] = 0;
        $data['total'] = 0;

        foreach (Comment::all() as $comment) {
            $data['quality'] += $comment->quality;
            $data['worth'] += $comment->worth;
            $data['design'] += $comment->design;
        }
        if ($data['quality']!=0 and $data['worth']!=0 and $data['design']!=0) {
            $data['quality'] /= $count;
            $data['worth'] /= $count;
            $data['design'] /= $count;
        }
        $data['total'] = ($data['quality'] + $data['worth'] + $data['design']) / 3;
        return $data;
    }
}
