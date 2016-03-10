<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Identity;
use App\Models\Survey;

class IdentityController extends Controller
{
    public function index()
    {
        return view('identity.index', ['identities' => Identity::all()]);
    }
    
    public function reset()
    {
        $list = ['anonymous alligator', 'anonymous anteater', 'anonymous armadillo', 'anonymous auroch', 'anonymous axolotl', 'anonymous badger', 'anonymous bat', 'anonymous beaver', 'anonymous buffalo', 'anonymous camel', 'anonymous chameleon', 'anonymous cheetah', 'anonymous chipmunk', 'anonymous chinchilla', 'anonymous chupacabra', 'anonymous cormorant', 'anonymous coyote', 'anonymous crow', 'anonymous dingo', 'anonymous dinosaur', 'anonymous dolphin', 'anonymous duck', 'anonymous elephant', 'anonymous ferret', 'anonymous fox', 'anonymous frog', 'anonymous giraffe', 'anonymous gopher', 'anonymous grizzly', 'anonymous hedgehog', 'anonymous hippo', 'anonymous hyena', 'anonymous jackal', 'anonymous ibex', 'anonymous ifrit', 'anonymous iguana', 'anonymous koala', 'anonymous kraken', 'anonymous lemur', 'anonymous leopard', 'anonymous liger', 'anonymous llama', 'anonymous manatee', 'anonymous mink', 'anonymous monkey', 'anonymous narwhal', 'anonymous nyan cat', 'anonymous orangutan', 'anonymous otter', 'anonymous panda', 'anonymous penguin', 'anonymous platypus', 'anonymous python', 'anonymous pug', 'anonymous quagga', 'anonymous rabbit', 'anonymous raccoon', 'anonymous rhino', 'anonymous sheep', 'anonymous shrew', 'anonymous skunk', 'anonymous slow loris', 'anonymous squirrel', 'anonymous turtle', 'anonymous walrus', 'anonymous wolf', 'anonymous wolverine', 'anonymous wombat'];
        
        Identity::truncate();
        
        foreach($list as $item) {
            $identity = [
                'name' => $item,
                'taken' => false,
                'confirmed' => false,
                'answers' => [],
            ];
            
            $result = Identity::firstOrCreate($identity);
        }

        return redirect('admin/identity');
    }
    
    public function delete($id)
    {
        if ($identity = Identity::find($id)) {
            $identity->delete();
        }
        
        return redirect('admin/identity');
    }
    
    public function view($id)
    {
        if ($identity = Identity::find($id)) {
            $surveys = [];
            
            foreach ($identity->answers as $answer) {
                $survey = Survey::find($answer['survey_id']);
                array_push($surveys, $survey);
            }
            
            return view('admin.identity.view', ['identity' => $identity, 'surveys' => $surveys]);
        }
        
        return redirect('admin/identity');
    }
}
