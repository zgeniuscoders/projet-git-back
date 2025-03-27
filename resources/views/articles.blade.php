<div style="margin-left: 400px;">
   <h1>Articles</h1>
   <table style="width: 500px; text-align:center; " border="2">
   <thead>
      <tr>
         <th>Title</th>
         <th>slug</th>
         <th>Image</th>
         <th>auteur</th>
         <th>content</th>
      </tr>
   </thead>
  <tbody>
  @foreach($articles as $article)
   <tr>
      
      <td>{{$article->title}}</td>
      <td>{{$article->slug}}</td>
      <td><img height="100" width="100" style="border-radius: 10px;" src="{{$article->photo}}" alt="Image"></td>
      <td>{{$article->auteur}}</td>
      <td>{{$article->content}}</td>

   </tr>
   @endforeach
  </tbody>
   </table>
</div>
