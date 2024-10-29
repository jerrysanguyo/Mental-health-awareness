<?php

namespace App\Http\Controllers\CMS;

use App\{
    Models\Answer,
    Models\Question,
    DataTables\UniversalDataTable,
    Services\CMS\AnswerService,
    Http\Controllers\Controller,
    Http\Requests\CMS\StoreAnswerRequest,
    Http\Requests\CMS\UpdateAnswerRequest
};

use Illuminate\{
    Support\Facades\Auth,
};

class AnswerController extends Controller
{
    protected $answerService;

    public function __construct(AnswerService $answerService)
    {
        $this->answerService = $answerService;
    }

    public function index(UniversalDataTable $dataTable)
    {
        $data = Answer::getAllAnswers();
        $listOfQuestion = Question::getAllQuestions();
        $pageTitle = 'answer';
        $columns = ['Question', 'Name', 'Remarks', 'Created by', 'Updated by', 'Action'];

        return $dataTable->render('cms.index', compact(
            'data', 
            'pageTitle', 
            'columns',
            'listOfQuestion',
        ));
    }
    
    public function store(StoreAnswerRequest $request)
    {
        $userRole = Auth::user()->role;
        $this->answerService->store($request->validated());

        return redirect()->route($userRole . '.answer.index')
            ->with('success', 'Successfully saved!');
    }
    
    public function edit(Answer $answer)
    {
        $pageTitle = 'answer';
        $$pageTitle = $answer;
        $listOfQuestion = Question::getAllQuestions();

        return view('cms.edit', compact(
            $pageTitle, 
            'pageTitle',
            'listOfQuestion',
        ));
    }
    
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        $userRole = Auth::user()->role;
        $this->answerService->update($request->validated(), $answer);

        return redirect()->route($userRole . '.answer.edit', $answer)
            ->with('success', 'Successfully saved!');
    }
    
    public function destroy(Answer $answer)
    {
        $userRole = Auth::user()->role;
        $this->answerService->destroy($answer);

        return redirect()->route($userRole . '.answer.index')
            ->with('success', 'Deleted successfully!');
    }
}
