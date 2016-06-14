<?php

  include_once 'Carrega.class.php';
/**
 *
 */
class Select
{
    public $id;
    public $semestre;
    public $dia;
    public $alimento;
    public $status;
    //public $;
    //public $;
    //public $;
    public $bd;

    function __construct()
    {
      $this->bd = new BD();
    }

    public function __destruct()
    {
       unset($this->bd);
    }

    public function __get($key)
    {
       return $this->$key;
    }

    public function __set($key, $value)
    {
       $this->$key = $value;
    }

    public function semestreSelect($semestre="")
    {
      $sql    = "SELECT * from semestre Order by id_sem";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
         $this->id       = $a['id_sem'];
         $this->semestre = $a['semestre'];

         if ($semestre==$this->id)
         {
           print "<option selected value='{$this->id}'>{$this->semestre}</option>";
         }
         else
         {
           print "<option value='{$this->id}'>{$this->semestre}</option>";
         }
       }
      }
    }

    public function localSelect($sala="")
    {
      $sql    = "SELECT * FROM local ORDER BY id_lo";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $object       = new Local();
          $object->id   = $a['id_lo'];
          $object->sala = $a['sala'];

         if ($sala==$object->id)
         {
           print "<option selected value='{$object->id}'>{$object->sala}</option>";
         }
         else
         {
           print "<option value='{$object->id}'>{$object->sala}</option>";
         }
       }
     }
    }

    public function diaSelect($dia="")
    {
      $sql    = "SELECT * from dia Order by id_dia";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $this->id  = $a['id_dia'];
          $this->dia = $a['dia'];

          if ($dia==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->dia}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->dia}</option>";
          }
        }
      }
    }

    public function alimentoSelectOFF($alimento="")
    {
      $sql    = "SELECT * from alimentos Order by id_ali";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
       echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $this->id       = $a['id_ali'];
          $this->alimento = $a['alimento'];

            if ($alimento==$this->id)
            {
              print "<option selected value='{$this->id}'>{$this->alimento}</option>";
            }
            else
            {
              print "<option value='{$this->id}'>{$this->alimento}</option>";
            }
        }
      }
    }

    public function cursoSelect($curso="")
    {
        $sql    = "SELECT * from cursos c WHERE c.inst_id=1 Order by id_curso";
        $result = pg_query($sql);
        $ln     = pg_num_rows($result);

        if ($ln==0)
        {
          echo "<option value=''>Nada Encontrado!!</option>";
        }
        else
        {

          while ($a = pg_fetch_array($result))
          {
            $this->id    = $a['id_curso'];
            $this->curso = $a['nome'];

            if ($curso==$this->id)
            {
              print "<option selected value='{$this->id}'>{$this->curso}</option>";
            }
            else
            {
              print "<option value='{$this->id}'>{$this->curso}</option>";
            }
          }
        }
    }

    public function cursoGeneralSelect($curso="")
    {
        $sql    = "SELECT * from cursos c Order by id_curso";
        $result = pg_query($sql);
        $ln     = pg_num_rows($result);

        if ($ln==0)
        {
          echo "<option value=''>Nada Encontrado!!</option>";
        }
        else
        {

          while ($a = pg_fetch_array($result))
          {
            $this->id    = $a['id_curso'];
            $this->curso = $a['nome'];

            if ($curso==$this->id)
            {
              print "<option selected value='{$this->id}'>{$this->curso}</option>";
            }
            else
            {
              print "<option value='{$this->id}'>{$this->curso}</option>";
            }
          }
        }
    }

    public function categoriaSelect($categoria='')
    {
      $sql    = "SELECT * from categorias Order by id_cat";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {

        while ($a = pg_fetch_array($result))
        {
          $this->id        = $a['id_cat'];
          $this->categoria = $a['categoria'];

          if ($categoria==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->categoria}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->categoria}</option>";
          }
        }
      }
    }

    public function statusSelect($status="")
    {
      $sql    = "SELECT * FROM status Order by id_sta";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $this->id     = $a['id_sta'];
          $this->status = $a['status'];

          if ($status==$this->id)
          {
            print "<option selected value='{$this->id}'>{$this->status}</option>";
          }
          else
          {
            print "<option value='{$this->id}'>{$this->status}</option>";
          }
        }
      }
    }

    public function alimentoSelect($alimento ="")
    {
       $sql    = "SELECT * FROM alimentos";
       $result = pg_query($sql);
       $ln     = pg_num_rows($result);

       if ($ln==0)
       {
          echo "<option value=''>Nada Encontrado!!</option>";
       }
       else
       {
          while ($a = pg_fetch_array($result))
          {
            $object           = new Alimentos();
            $object->id       = $a['id_ali'];
            $object->alimento = $a['alimento'];

            if (is_array($alimento))
            {
              if(in_array($object->id, $alimento))
              {
                 print "<option selected value='{$object->id}'>{$object->alimento}</option>";
              }
              else
              {
                 print "<option value='{$object->id}'>{$object->alimento}</option>";
              }
            }
            else
            {
              if($object->id==$alimento)
              {
                 print "<option selected value='{$object->id}'>{$object->alimento}</option>";
              }
              else
              {
                 print "<option value='{$object->id}'>{$object->alimento}</option>";
              }
            }
          }
        }
      }

    public function categoriaMultiSelected($categoria ="")
    {
         $sql    = "SELECT * FROM categorias ORDER BY id_cat";
         $result = pg_query($sql);
         $ln     = pg_num_rows($result);

         if ($ln==0)
         {
            echo "<option value=''>Nada Encontrado!!</option>";
         }
         else
         {
            while ($a = pg_fetch_assoc($result))
            {
              $object            = new Categorias();
              $object->id        = $a['id_cat'];
              $object->categoria = $a['categoria'];

              if (is_array($categoria))
              {
                if(in_array($object->id, $categoria))
                {
                   print "<option selected value='{$object->id}'>{$object->categoria}</option>";
                }
                else
                {
                   print "<option value='{$object->id}'>{$object->categoria}</option>";
                }
              }
              else
              {
                if($object->id == $categoria)
                {
                   print "<option selected value='{$object->id}'>{$object->categoria}</option>";
                }
                else
                {
                   print "<option value='{$object->id}'>{$object->categoria}</option>";
                }
              }
            }
          }
      }

   public function eventoSelect($evento='')
   {
      $sql    = "SELECT * FROM eventos ORDER BY id_event";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
         echo "<option value=''> Nada encontrado!! </option>";
      }
      else
      {
         while ($a  = pg_fetch_array($result))
         {
            $object         = new Eventos();
            $object->id     = $a['id_event'];
            $object->evento = $a['evento'];

            if ($evento==$object->id)
            {
               print "<option selected value='{$object->id}'>{$object->evento}</option>";
            }
            else
            {
               print "<option value='{$object->id}'>{$object->evento}</option>";
            }
         }
      }
   }

   public function institutoSelect($id ="")
   {
      $sql    = "SELECT * FROM instituto ORDER BY id_inst";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

     if ($ln==0)
     {
        echo "<option value=''>Nada Encontrado!!</option>";
     }
     else
     {
       while ($a = pg_fetch_array($result))
       {
         $object            = new Instituto();
         $object->id        = $a['id_inst'];
         $object->instituto = $a['instituto'];

         if ($id==$object->id)
         {
           print "<option selected value='{$object->id}'>{$object->instituto}</option>";
         }
         else
         {
           print "<option value='{$object->id}'>{$object->instituto}</option>";
         }
       }
     }
   }

   public function cursoGeneralMultiSelect($curso='')
   {
      $sql    = "SELECT * FROM cursos Order By nome";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
         echo "<option value=''>Nada encontrado!!</option>";
      }
      else
      {
         while ($reg = pg_fetch_assoc($result))
         {
            $object       = new Cursos();
            $object->id   = $reg['id_curso'];
            $object->nome = $reg['nome'];

            if (in_array($object->id, $curso))
            {
               echo "<option selected value='{$object->id}'>{$object->nome}</option>";
            }
            else
            {
               echo "<option value='{$object->id}'>{$object->nome}</option>";
            }
         }
      }
   }

   public function labelCategorias($categoria = "")
   {
     $sql    = "SELECT * FROM categorias";
     $result = pg_query($sql);
     $ln     = pg_num_rows($result);

     if ($ln==0)
     {
        echo "<small class='label bg-red'>ERRO</small>";
     }
     else
     {
        while ($a = pg_fetch_assoc($result))
        {
          $object            = new Categorias();
          $object->id        = $a['id_cat'];
          $object->categoria = $a['categoria'];

          if (is_array($categoria))
          {
            if(in_array($object->id, $categoria))
            {
              print "<small class='label bg-blue'>{$object->categoria}</small>  ";
            }
          }
          else
          {
            if($this->id==$categoria)
            {
               print "<small class='label bg-blue'>{$object->categoria}</small>  ";
            }
          }
        }
      }
   }

   public function labelCursos($cursos = "")
   {
     $sql    = "SELECT id_curso, nome from cursos ORDER BY nome";
     $result = pg_query($sql);
     $ln     = pg_num_rows($result);

     if ($ln==0)
     {
        echo "<small class='label bg-red'>ERRO</small>";
     }
     else
     {
        while ($a = pg_fetch_assoc($result))
        {
          $object       = new Cursos();
          $object->id   = $a['id_curso'];
          $object->nome = $a['nome'];

         if(in_array($object->id, $cursos))
         {
           print "<small class='label bg-blue'>{$object->nome}</small>  ";
         }
        }
     }
   }

   public function typeSelect($type="")
   {
      $sql    = "SELECT * from usertype Order by id_type";
      $result = pg_query($sql);
      $ln     = pg_num_rows($result);

      if ($ln==0)
      {
        echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
        while ($a = pg_fetch_array($result))
        {
          $id   = $a['id_type'];
          $type = $a['type'];

          if ($type==$this->id)
          {
            print "<option selected value='{$id}'>{$type}</option>";
          }
          else
          {
            print "<option value='{$id}'>{$type}</option>";
          }
        }
      }
   }

   public function diaSelectS($dia='')
   {
     $sql    = "SELECT * FROM dia ORDER BY id_dia";
     $result = pg_query($sql);
     $ln     = pg_num_rows($result);

     if ($ln==0)
     {
       echo "<option value=''>Nada Encontrado!!</option>";
     }
     else
     {
       while ($a = pg_fetch_array($result))
       {
         $this->id  = $a['id_dia'];
         $this->dia = $a['dia'];

         if ($dia==$this->id)
         {
           print "<option selected value='{$this->id}'>{$this->dia}</option>";
         }
         else
         {
           print "<option value='{$this->id}'>{$this->dia}</option>";
         }
       }
     }
   }
}
?>
