<h2>Product Name: </h2>
<p>{{ $post->title }} || ${{ $post->link }}</p>

<h3>Product Belongs to</h3>

<ul>
    @foreach($post->categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
</ul>
