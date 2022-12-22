@extends ('layouts.app')

@section ('content')

<!-- create labels for editing questions -->

<div class="container">
    <h1 class="title">Edit Question</h1>
    <form action="/questions/{{ $question->id }}" method="POST">
        @csrf
        @method('PUT')
        @if ($question->type == 'Fill in the Blank')
            <div class="field">
                <label class="label" for="question">Question</label>
                <div class="control">
                    <input class="input" type="text" name="question" id="question" value="{{ $question->question }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="answer">Answer</label>
                <div class="control">
                    <input class="input" type="text" name="answer" id="answer" value="{{ $question->answer }}">
                </div>
            </div>
        @endif
        @if ($question->type == 'Numerical')
        <div class="field">
            <label class="label" for="question">Question</label>
            <div class="control">
                <input class="input" type="text" name="question" id="question" value="{{ $question->question }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="answer">Answer</label>
            <div class="control">
                <input class="input" type="number" name="answer" id="answer" value="{{ $question->answer }}">
            </div>
        </div>
        @endif
        <!-- change the options to be editable -->
        @if ($question->type == 'MCQ')
            <div class="field">
                <label class="label" for="question">Question</label>
                <div class="control">
                    <input class="input" type="text" name="question" id="question" value="{{ $question->question }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="answer">Answer</label>
                <div class="control">
                    <input class="input" type="text" name="answer" id="answer" value="{{ $question->answer }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="option1">Option 1</label>
                <div class="control">
                    <input class="input" type="text" name="option1" id="option1" value="{{ $question->option1 }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="option2">Option 2</label>
                <div class="control">
                    <input class="input" type="text" name="option2" id="option2" value="{{ $question->option2 }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="option3">Option 3</label>
                <div class="control">
                    <input class="input" type="text" name="option3" id="option3" value="{{ $question->option3 }}">
                </div>
            </div>
        @endif

        @if ($question->type == 'DCQ')
            <div class="field">
                <label class="label" for="question">Question</label>
                <div class="control">
                    <input class="input" type="text" name="question" id="question" value="{{ $question->question }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="answer">Answer</label>
                <div class="control">
                    <input class="input" type="text" name="answer" id="answer" value="{{ $question->answer }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="option1">Option 1</label>
                <div class="control">
                    <input class="input" type="text" name="option1" id="option1" value="{{ $question->option1 }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="option2">Option 2</label>
                <div class="control">
                    <input class="input" type="text" name="option2" id="option2" value="{{ $question->option2 }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="option2">Option 3</label>
                <div class="control">
                    <input class="input" type="text" name="option3" id="option3" value="{{ $question->option3 }}">
                </div>
            </div>
        @endif
        
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection

