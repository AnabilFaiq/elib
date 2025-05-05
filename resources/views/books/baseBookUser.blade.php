@extends('layouts.base')
@section('title')
    ELibrary | Book
@endsection
@section('content')
    <section class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <!-- Heading & Filters -->
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($book as $book)
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="h-56 w-full">
                      <a href="#">
                        <img class="mx-auto h-full dark:hidden" src="{{ asset('images/' . $book->cover) }}" alt="" />
                        <img class="mx-auto hidden h-full dark:block" src="{{ asset('images/' . $book->cover) }}" alt="" />
                      </a>
                    </div>
                    <div class="pt-6">
            
                      <p class="text-lg font-semibold leading-tight text-gray-900  dark:text-white">{{ $book->title }}</p>

                      <ul class="mt-2 flex-row items-center gap-4">
                        <li class="flex items-center gap-2">
                          <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Genre : {{ $book->category?->name ?? 'No Category' }}</p>
                        </li>
                      </ul>
            
                      <div class="mt-2 flex items-center gap-2">
                        <div class="flex items-center">
                          <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
            
                          <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
            
                          <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
            
                          <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
            
                          <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                        </div>
            
                        <p class="text-sm font-medium text-gray-900 dark:text-white">5.0</p>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">(455)</p>
                      </div>
                      
                      <ul class="mt-2 flex-row items-center gap-4">
                        <li class="flex items-center gap-2">
                          <p class="text-sm font-semibold leading-tight text-gray-900  dark:text-white">Author : {{ $book->author }}</p>
                        </li>

                        <li class="flex items-center gap-2">
                          <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Description : {{ $book->description}}</p>
                        </li>
                      </ul>

                      <div class="mt-4 flex items-center justify-between gap-4">
                        <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">$1,699</p>
            
                        <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal" data-book-id="{{ $book->id }}" data-book-title="{{ $book->title }}" data-book-description="{{ $book->description }}" class="borrow-book-btn inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                          <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                          </svg>
                          Add to cart
                        </button>

                        <!-- Main modal -->
                        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                          <div class="relative p-4 w-full max-w-md max-h-full">
                              <!-- Modal content -->
                              <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                  <!-- Modal header -->
                                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                          Borrow a book
                                      </h3>
                                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                          </svg>
                                          <span class="sr-only">Close modal</span>
                                      </button>
                                  </div>
                                  <!-- Modal body -->
                                  <form class="p-4 md:p-5" action="{{ route('peminjamans.store') }}" method="POST" >
                                    @csrf
                                      <div class="grid gap-4 mb-4 grid-cols-2">
                                          <div class="col-span-2">
                                              <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book's Title</label>
                                              <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="" value="{{ $book->title }}">
                                          </div>
                                          <div class="col-span-2 ">
                                              <label for="borrowDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Borrow Date</label>
                                              <input type="date" name="borrowDate" id="borrowDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="" >
                                          </div>
                                          <div class="col-span-2">
                                              <label for="returnDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Return Date</label>
                                              <input type="date" name="returnDate" id="returnDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                                          </div>
                                          <div class="col-span-2">
                                              <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                                              <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here" ></textarea>                    
                                          </div>
                                      </div>
                                      <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                          <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                          Borrow Now!
                                      </button>
                                  </form>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        // get all borrow buttons
        const borrowButtons = document.querySelectorAll('.borrow-book-btn');
        // add click event to each button
        borrowButtons.forEach(button => {
          button.addEventListener('click', function(e) {
            // get book id from data attribute
            const bookId = this.getAttribute('data-book-id');
            // get book title from data attribute
            const bookTitle = this.getAttribute('data-book-title');
            // get book description from data attribute
            const bookDescription = this.getAttribute('data-book-description');
            // open modal

            // set values in the modal form
            document.getElementById('title').value = bookTitle;
            document.getElementById('description').value = bookDescription;

            if (!document.getElementById('book_id')) {
              const hiddenInput = document.createElement('input');
              hiddenInput.type = 'hidden';
              hiddenInput.id = 'book_id';
              hiddenInput.name = 'book_id';
              hiddenInput.value = bookId;
              document.querySelector('#crud-modal form').appendChild(hiddenInput);
            } else {
              document.getElementById('book_id').value = bookId;
            }
          })
        })
      })
    </script>
@endsection
