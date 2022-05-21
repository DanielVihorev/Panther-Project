using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Vihorev.Models;

namespace Vihorev.Controllers
{
    public class MoviesController : Controller
    {
        //I need to change this funtion to a account holder 
        public ActionResult Random()
        {
            var movie = new movie() { Name = "Shrek!" };

            return View(movie); // this function runs the movie in the browser
            
        }
    }
}
