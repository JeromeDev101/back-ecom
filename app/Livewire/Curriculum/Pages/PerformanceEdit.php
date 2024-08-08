<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Title;
use App\Models\CurriculumPerformance;
use Jantinnerezo\LivewireAlert\LivewireAlert;
#[Lazy()]
#[Title('CEIT | Performance - Edit')]
class PerformanceEdit extends Component
{
    use LivewireAlert;

    public $id;
    public $performance;
    public $checkboxDate = false;

    public function mount()
    {
        $this->performance = CurriculumPerformance::find($this->id);

        if($this->performance['date_held_from'] == $this->performance['date_held_to']) {
            $this->checkboxDate = true;
        }
    }

    public function rules()
    {
        return [
            'performance.exam_type' => 'required',
            'performance.cvsu_passing' => 'required',
            'performance.natl_passing' => 'required',
            'performance.date_held_from' => 'required',
            'performance.date_held_to' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'performance.exam_type' => 'Please provide type of examination',
            'performance.cvsu_passing' => 'Please provide CVSU passing %.',
            'performance.natl_passing' => 'Please provide National passing %.',
            'performance.date_held_from' => 'Please provide date held From.',
            'performance.date_held_to' => 'Please provide date held To.',
        ];
    }

    public function updatedPerformance($value, $key)
    {
        if($key === 'date_held_from') {
            if($this->checkboxDate) {
                $this->performance['date_held_to'] = $value;
            }
        }
    }

    public function updatedCheckboxDate($value)
    {
        if($value){
            $this->performance['date_held_to'] = $this->performance['date_held_from'];
        } else {
            $this->performance['date_held_to'] = '';
        }
    }

    public function save()
    {
        $this->validate();

        $performance = CurriculumPerformance::find($this->id);
        if($performance) {
            $performance->exam_type = $this->performance['exam_type'];
            $performance->cvsu_passing = $this->performance['cvsu_passing'];
            $performance->natl_passing = $this->performance['natl_passing'];
            $performance->date_held_from = Carbon::parse($this->performance['date_held_from'])->format('Y-m-d');
            $performance->date_held_to = Carbon::parse($this->performance['date_held_to'])->format('Y-m-d');
            $performance->save();
        }


        $this->flash('success', 'Successfully Updated',[
            'position' => 'center'
        ], 'curriculum/performance');
        return redirect('curriculum/performance');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.performance-edit');
    }
}
