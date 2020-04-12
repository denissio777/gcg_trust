function mark(id){
  $.post(
      "mark",
      {
        id: id
      }
  );
  $("#requests").load(location.href + " #requests");
}