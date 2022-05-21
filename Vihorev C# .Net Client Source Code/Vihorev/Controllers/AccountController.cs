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
        //Movies/Random
        public ActionResult Random()
        {
            var movie = new movie() { Name = "Shrek!" };

            //return View(movie); // this function runs the movie in the browser
            return Content("Hello World!")
            
        }
    }
}
