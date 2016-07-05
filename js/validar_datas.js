function validarData()
{
   alert("Sasha");
   var currentTime = new Date();
   var month = currentTime.getMonth()+"";if(month.length==1)  month="0"+month;
   var day = currentTime.getDate()+"";if(day.length==1) day="0" +day;
   var year = currentTime.getFullYear();
   var date = day + "/" + month + "/" + year;

   //var evento = document.evento;
   //console.log(form_insere);
   //var dataI = new Date(evento.dataInicio.value);
   //var dataF = new Date(evento.dataFim.value);
   var datai = document.getElementById(dataInicio).value;
   var dataf = document.getElementById(dataFim).value;
   var dataA = date;

   var dataI = new Date(datai);
   var dataF = new Date(dataf);

   if (!dataI || !dataF) return false

   if (dataI > dataF && dataI < dataA)
   {
      alert("Data não pode ser maior que a data final");
      return false;
   }
   else if (dataF < dataA && dataF < dataI)
   {
      alert("Data não pode ser maior que a data final");
      return false;
   }
   else
   {
      return true
   }
}
