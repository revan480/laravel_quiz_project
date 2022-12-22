@extends ( 'layouts.app' )

@section ( 'content' )

<!-- create a card to show questions and answer options then create a button to delete and edit questions -->

<div class="container">
    <div class="card">
        <div class="card-content">
            <div class="content">
                <h1 class="title">Questions</h1>
                <div style="width: full; overflow: auto;">
                <table class="table is-fullwidth ">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Type</th>
                            <th>Options</th>
                            <th>Actions</th>
                            <th>Answer</th>
                            <th>Answer Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->type }}</td>
                                <td>
                                    <ul class="variant mt-0" style="list-style: none;">
                                    <li>{{ $question->option1 }}</li>
                                    <li>{{ $question->option2 }}</li>
                                    <li>{{ $question->option3 }}</li>
                                    </ul>
                                    <!-- make bold only ol type not li -->
                                    
                                </td>
                                <!-- Create a column that will be seen after clicking the button -->
                                <td>
                                    <div style="gap: 8px; display:flex; flex-direction:column;">
                                    <a href="/questions/{{ $question->id }}/edit" class="button is-link">Edit</a>
                                    <!-- Create a form for deleting question -->
                                    <form action="/questions/{{ $question->id }}/delete" method="POST">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="button is-danger">Delete</button>
                                    </form>
                                    </div>
                                </td>
                                <td>
                                    <div id="answer-{{ $question->id }}" style="display: none">
                                        {{ $question->answer }}
                                    </div>
                                </td>
                                <td>
                                    <button id="showAnswer{{ $question->id }}" class="button is-link" onclick="showAnswer({{ $question->id }})">Show Answer</button>
                                    <div id="answer-{{ $question->id }}" style="display: none">
                                        {{ $question->answer }}
                                    </div>
    
                                    <script>
                                        function showAnswer(id) {
                                            var answer = document.getElementById('answer-' + id);
                                            var button = document.getElementById('showAnswer' + id);
                                            if (answer.style.display === 'none') {
                                                answer.style.display = 'block';
                                                button.innerHTML = 'Hide Answer';
                                            } else {
                                                answer.style.display = 'none';
                                                button.innerHTML = 'Show Answer';
                                            }
                                        }
                                    </script>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection