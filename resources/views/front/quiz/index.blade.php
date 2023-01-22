@extends('front.layouts.app')
@section('title','Find your favorite')
@section('descrtipion',env("DEFAULT_DESC"))
@section('content')
@include('front.layouts.navbar')

    <div id="data">
    </div>
@endsection

@section('scripts')
    <script>

function shareButton(){

    const shareData = {
        title: document.getElementById('title').childNodes[0].textContent,
        text: document.getElementById('description').childNodes[0].textContent,
        url: '{{ env('APP_URL') }}',
    }

    const btn = document.getElementById('share-result');

    // Must be triggered some kind of "user activation"
    btn.addEventListener('click', async () => {
        console.log('test')
        await navigator.share(shareData)
    });
}
        loadQuiz()
        // document.getElementById('start-quiz').addEventListener('click', loadQuiz);
        var selected_array = new Array();
        function loadQuiz(){
            var quiz = document.querySelectorAll('.quiz');
            if(quiz.length == 5){
                for (var i=0; i<quiz.length; i++){
                    var selected = document.querySelectorAll('.selected');
                    selected_array[i] = selected[i].getAttribute('data-value');
                }
            }
            if(quiz.length <= 5){
                var xhr = new XMLHttpRequest();

                token = document.getElementsByTagName('meta')['csrf-token'].content;
                xhr.open('POST', '{{ route('quiz.start') }}?quiz='+quiz.length+'&selected='+selected_array, true);

                xhr.setRequestHeader('X-CSRF-Token', token);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

                xhr.onload = function(){
                    if(this.status == 200){
                        if(document.getElementById('header')){
                            document.getElementById('header').remove();
                        }else{
                            for (var i = 0; i<quiz.length; i++){
                                quiz[i].style.cssText = 'display:none';
                            }
                        }

                        data.innerHTML += JSON.parse(xhr.responseText).html
                        if(quiz.length == 5){
                            shareButton();
                        }
                        toggleItem(document.querySelectorAll('.option'));
                    }
                }
                xhr.send();
            }
        }

        function toggleItem(elem) {
            for (var i = 0; i < elem.length; i++) {
                elem[i].addEventListener("click", function(e) {
                    var current = this;
                    for (var i = 0; i < elem.length; i++) {
                        if (current != elem[i]) {
                        } else if (current.classList.contains('selected') === true) {
                        } else {
                            current.classList.add('selected');
                            loadQuiz();
                        }
                    }
                    e.preventDefault();
                });
            };
        }
    </script>
@endsection
