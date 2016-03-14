<?php

  include_once 'Carrega.class.php';
/**
 *
 */
class Select
{
    public $id;
    public $semestre;
    public $sala;
    public $dia;
    public $alimento;
    public $curso;
    public $categoria;
    public $status;
    public $evento;
    public $instituto;
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
      $sql    = "SELECT * from local Order by id_lo";
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
         $this->id   = $a['id_lo'];
         $this->sala = $a['sala'];

         if ($sala==$this->id)
         {
           print "<option selected value='{$this->id}'>{$this->sala}</option>";
         }
         else
         {
           print "<option value='{$this->id}'>{$this->sala}</option>";
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

    public function alimentoSelect($alimento="")
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
        $sql    = "SELECT * from cursos Order by id_curso";
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
      $sql    = "SELECT * from status Order by id_sta";
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

    public function alimentoMulti($alimento ="")
    {
       $sql = "SELECT * from alimentos";
       $result = pg_query($sql);

       $ln=pg_num_rows($result);

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
            //$count=count($a);

            if(in_array($this->id, $alimento))
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

    public function categoriaMultiSelected($categoria ="")
    {

         //print_r($categoria);
         $sql    = "SELECT * from categorias";
         $result = pg_query($sql);

         $ln = pg_num_rows($result);

         if ($ln==0)
         {
            echo "<option value=''>Nada Encontrado!!</option>";
         }
         else
         {
            while ($a = pg_fetch_assoc($result))
            {
              $this->id        = $a['id'];
              $this->categoria = $a['categoria'];

              if(in_array($this->id, $categoria))
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

   public function categoriaUnselected($categoria ="")
   {
      $sql    = "SELECT * from categorias";
      $result = pg_query($sql);

      $ln = pg_num_rows($result);

      if ($ln==0)
      {
         echo "<option value=''>Nada Encontrado!!</option>";
      }
      else
      {
         while ($a = pg_fetch_assoc($result))
         {
           $this->id        = $a['id'];
           $this->categoria = $a['categoria'];
           //$count=count($a);

          // foreach ($categoria as $key)
           //{
            // if ($this->id!=$key)
            // {
               print "<option value='{$this->id}'>{$this->categoria}</option>";
             //}
           //}
         }
      }
   }

   public function eventoSelect($evento='')
   {
      $sql    = "SELECT * from eventos Order by id_event";
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
            $this->id     = $a['id_event'];
            $this->evento = $a['evento'];

            if ($evento==$this->id)
            {
               print "<option selected value='{$this->id}'>{$this->evento}</option>";
            }
            else
            {
               print "<option value='{$this->id}'>{$this->evento}</option>";
            }
         }
      }
   }

   public function institutoSelect($id ="")
   {
      $sql    = "SELECT * from instituto Order by id_inst";
      $result = pg_query($sql);
      $ln     =pg_num_rows($result);

     if ($ln==0)
     {
        echo "<option value=''>Nada Encontrado!!</option>";
     }
     else
     {

       while ($a = pg_fetch_array($result))
       {

         $this->id        = $a['id_inst'];
         $this->instituto = $a['instituto'];

         if ($id==$this->id)
         {
           print "<option selected value='{$this->id}'>{$this->instituto}</option>";
         }
         else
         {
           print "<option value='{$this->id}'>{$this->instituto}</option>";
         }
       }
     }
   }


}
?>
