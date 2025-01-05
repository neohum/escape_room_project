<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use DOMDocument;


class GameMaker extends Model
{
    //
  use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'title',
        'editorjs',
        'question',
        'select',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'answer5',
        'choice1',
        'choice2',
        'choice3',
        'choice4',
        'choice5',
        'prev_id',
        'next_id',
    ];

    protected function editorjs(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => $this->makeBodyContent($value),
        );
    }


    public function makeBodyContent($content)
    {
        $dom = new DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        /** @var \DOMElement $image */

        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/uploads/" . time().$item.'.jpeg';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        return $dom->saveHTML();
    }
}
