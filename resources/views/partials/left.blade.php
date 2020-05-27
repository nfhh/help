<div class="list-group list-group-flush my-tab" id="a-box">
    @foreach($subjects as $subject)
        <a href="/faq?subject_id={{$subject['id']}}"
           class="list-group-item list-group-item-action text-dark">{{ $subject[$lan] }}</a>
    @endforeach
</div>
