<?php






if(!function_exists('op_semester'))
{
    function op_semester()
    {
        
        return   '<option value="" selected disabled>pilih Semester</option>'
            
                .'<option value="I">Semester I</option>'
                .'<option value="II">Semester II</option>'
                .'<option value="III">Semester III</option>'
                .'<option value="IV">Semester IV</option>'
                .'<option value="V">Semester V</option>'
                .'<option value="VI">Semester VI</option>'
                .'<option value="VII">Semester VII</option>'
                .'<option value="VIII">Semester VIII</option>';
    }
}
if(!function_exists('op_kelas'))
{
    function op_kelas()
    {
        return  '<option value="" selected disabled>pilih Kelas</option>'
                .'<option value="A">Kelas A</option>'
                .'<option value="B">Kelas B</option>'
                .'<option value="C">Kelas C</option>'
                .'<option value="D">Kelas D</option>'
                .'<option value="E">Kelas E</option>'
                .'<option value="F">Kelas F</option>';
    }
}
