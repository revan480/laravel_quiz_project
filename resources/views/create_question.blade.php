@extends ('layouts.app')

@section ('content')

<!-- show all errors -->
<!-- firstly create a card for choosing the question type. -->
<div class="container">
    <div class="card">
        <div class="card-content">
            <div class="content">
                <h1 class="title">Create Question</h1>
                <form method="GET" enctype="multipart/form-data">
                    <div class="field">
                        <label class="label">Question Type</label>
                        <div class="control">
                            <div class="select">
                                <select name="type">
                                    <option value="1">-------</option>
                                    <option value="2">Multiple Choice</option>
                                    <option value="3">Double Choice</option>
                                    <option value="4">Fill in the Blank</option>
                                    <option value="5">Numerical</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-link">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        

<!-- if the user has chosen a question type, show the form for that question type -->
<!-- if the user has chosen multiple choice and double choice, add a button to add more options -->
{{-- If the url consists of body "type" --}}
@if (request()->has('type'))

    {{-- If the type is multiple choice --}}
    @if (request('type') )
        {{-- Show the multiple choice form --}}
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <h1 class="title">Create Question</h1>
                    <form method="POST" action="/questions" enctype="multipart/form-data">
                        
                        @csrf
                        @If(request('type') == 4)
                            <input type="hidden" name="type" value="4">
                        <div class="field">
                            <label class="label">Question</label>
                            <div class="control">
                                <input class="input" type="text" name="question" id="question" placeholder="Question">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Answer</label>
                            <div class="control">
                                <input class="input" type="text" name="answer" id="answer" placeholder="Answer">
                            </div>
                        </div>
                        <input type="text" name="type" value="Fill in the Blank" style="display: none;">
                        @endif
                        @If(request('type') == 5)
                            <input type="hidden" name="type" value="5">
                        <div class="field">
                            <label class="label">Question</label>
                            <div class="control">
                                <input class="input" type="text" name="question" id="question" placeholder="Question">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Answer</label>
                            <div class="control">
                                <input class="input" type="number" name="answer" id="answer" placeholder="Answer">
                            </div>
                        </div>
                        <input type="text" name="type" value="Numerical" style="display: none;">
                        @endif
                        @if (request ('type') == 2) 
                            <div class="field">
                                <label class="label">Question</label>
                                <div class="control">
                                    <input class="input" type="text" name="question" id="question" placeholder="Question">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Answer</label>
                                <div class="control">
                                    <input class="input" type="text" name="answer" id="answer" placeholder="Answer">
                                </div>
                            </div>

                            
                            <div class="field">
                                <label class="label">Option 1</label>
                                <div class="control">
                                    <input class="input" type="text" name="option1" id="option1" placeholder="Option 1">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Option 2</label>
                                <div class="control">
                                    <input class="input" type="text" name="option2" id="option2" placeholder="Option 2">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Option 3</label>
                                <div class="control">
                                    <input class="input" type="text" name="option3" id="option3" placeholder="Option 3">
                                </div>
                            </div>
                            <input type="text" name="type" value="MCQ" style="display: none;">
                            @endif
                        @if (request ('type') == 3) 

                            <div class="field">
                                <label class="label">Question</label>
                                <div class="control">
                                    <input class="input" type="text" name="question" id="question" placeholder="Question">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Answer</label>
                                <div class="control">
                                    <input class="input" type="text" name="answer" id="answer" placeholder="Answer">
                                </div>
                            </div>
                            
                            <div class="field">
                                <label class="label">Option 1</label>
                                <div class="control">
                                    <input class="input" type="text" name="option1" id="option1" placeholder="Option 1">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Option 2</label>
                                <div class="control">
                                    <input class="input" type="text" name="option2" id="option2" placeholder="Option 2">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Option 3</label>
                                <div class="control">
                                    <input class="input" type="text" name="option3" id="option3" placeholder="Option 3">
                                </div>
                            </div>
                            <input type="text" name="type" value="DCQ" style="display: none;">
                        @endif

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link">Submit</button>
                            </div>
                        </div>
                        
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
@endif
@endsection
