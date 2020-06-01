<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="{{ route('category-subcategory.list') }}">Category and SubCategory</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('category-subcategory.list') }}">List of Category</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('category-subcategory.create') }}">Create Category</a>
    </li>
  </ul>
</nav>