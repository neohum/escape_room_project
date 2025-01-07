@props(['game_maker'])

<div>
    1. <button name='check1' id='check1' class="btn btn-primary" onclick=check()>{{ $game_maker->answer1 }}</button><p>
    {{ $game_maker->choice1 }}
</div>
<br>
<div>
    2. <button name='check2' id='check2' class="btn btn-primary" onclick=check()>{{ $game_maker->answer2 }}</button><p>
    {{ $game_maker->choice2 }}
</div>
<br>
<div>
    3. <button name='check3' id='check3' class="btn btn-primary" onclick=check()>{{ $game_maker->answer3 }}</button><p>
    {{ $game_maker->choice3 }}
</div>
<br>
<div>
    4. <button name='check4' id='check4' class="btn btn-primary" onclick=check()>{{ $game_maker->answer4 }}</button><p>
    {{ $game_maker->choice4 }}
</div>
<br>
<div>
    5. <button name='check5' id='check5' class="btn btn-primary" onclick=check()>{{ $game_maker->answer5 }}</button><p>
    {{ $game_maker->choice5 }}
</div>
