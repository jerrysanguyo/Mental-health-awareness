<?php

namespace App\Http\Controllers\CMS;

use App\{
    Models\Question,
    DataTables\UniversalDataTable,
    Http\Requests\CMS\StoreQuestionRequest,
    Http\Requests\CMS\UpdateQuestionRequest,
    Http\Controllers\Controller,
    Services\CMS\QuestionService,
};

use Illuminate\{
    Support\Facades\Auth,
};

class QuestionController extends Controller
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function index(UniversalDataTable $dataTable)
    {
        $data = Question::getAllQuestions();
        $pageTitle = 'question';
        $columns = ['Name', 'Remarks', 'Created by', 'Updated by', 'Action'];

        return $dataTable->render('cms.index', compact(
            'data', 
            'pageTitle', 
            'columns',
        ));
    }
    
    public function store(StoreQuestionRequest $request)
    {
        $userRole = Auth::user()->role;
        $this->questionService->store($request->validated());

        return redirect()->route($userRole . '.question.index')
            ->with('success', 'Successfully saved!');
    }
    
    public function edit(Question $question)
    {
        $pageTitle = 'question';
        $$pageTitle = $question;

        return view('cms.edit', compact(
            $pageTitle, 
            'pageTitle'
        ));
    }
    
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $userRole = Auth::user()->role;
        $this->questionService->update($request->validated(), $question);

        return redirect()->route($userRole . '.question.edit', $question)
            ->with('success', 'Successfully saved!');
    }
    
    public function destroy(Question $question)
    {
        $userRole = Auth::user()->role;
        $this->questionService->destroy($question);

        return redirect()->route($userRole . '.question.index')
            ->with('success', 'Deleted successfully!');
    }
}
