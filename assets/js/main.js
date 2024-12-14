class App {
  show(btn, route) {
    const id = btn.id;
    const data = { id: id };

    axios
      .post(`/${route}/show`, data)
      .then((response) => {
        const items = response.data;

        const modalBody = document.querySelector("#modalForm .modal-body");
        modalBody.innerHTML = "";

        for (const key in items) {
          if (items.hasOwnProperty(key)) {
            const value = items[key];

            const fieldWrapper = document.createElement("div");
            fieldWrapper.className = "form-group";

            const label = document.createElement("label");
            label.htmlFor = key;
            label.textContent = this.formatKey(key);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control";
            input.id = key;
            input.name = key;
            input.value = value;

            fieldWrapper.appendChild(label);
            fieldWrapper.appendChild(input);

            modalBody.appendChild(fieldWrapper);
          }
        }

        document.querySelector("#id").value = id;
        document.querySelector("#edit_mode").value = "1";

        $("#modalForm").modal("show");
      })
      .catch((error) => {
        console.warn("error: ", error);

        const errorAlert = document.querySelector("#modalForm .alert-danger");
        if (errorAlert) {
          const errorMessage = errorAlert.querySelector("p");
          if (errorMessage)
            errorMessage.textContent = "Error trying to load data.";
          errorAlert.style.display = "block";
        }
      });
  }

  confirm(btn) {
    const id = btn.id;

    $("#modalForm").modal("show");
    $("#id-del").val(id);
  }

  reloadGrid(route) {
    axios
      .post(`/${route}/load`, {})
      .then(function (response) {
        if (response.data !== "") {
          document.querySelector("#grid_container").innerHTML = response.data;
          $(`#${route}_grid`).DataTable();
        }
      })
      .catch(function (error) {
        console.warn("error loading data: " + error);
      });
  }

  save(route) {
    const formElement = document.querySelector("#modalForm");
    const formData = new FormData(formElement);

    let isValid = true;
    for (const [key, value] of formData.entries()) {
      if (!value.trim()) {
        isValid = false;
        break;
      }
    }

    if (!isValid) {
      document.querySelector("#modalForm .alert-danger p").textContent =
        "All fields are required.";
      document.querySelector("#modalForm .alert-danger").style.display =
        "block";
    } else {
      const action =
        document.querySelector("#edit_mode").value === "1" ? "/edit" : "/add";

      axios
        .post(`/${route}${action}`, formData)
        .then((response) => {
          if (response.data.success) {
            formElement.reset();
            document.querySelector("#id").value = "";
            document.querySelector("#edit_mode").value = "0";

            $("#modalForm").modal("hide");

            App.reloadGrid();
          }
        })
        .catch((error) => {
          console.warn("Error: ", error);

          document.querySelector("#modalForm .alert-danger p").textContent =
            "An error occurred while saving the data.";
          document.querySelector("#modalForm .alert-danger").style.display =
            "block";
        });
    }
  }

  delete(route) {
    const idToDelete = document.querySelector("#id_del").value; // Get the ID value
    const data = { id: idToDelete };

    axios
      .post(`/${route}/delete`, data)
      .then((response) => {
        if (response.data.success) {
          App.reloadGrid(); // Reload the user grid (assuming this function is defined elsewhere)
          $("#modalDelUser").modal("hide"); // Hide the deletion confirmation modal
        }
      })
      .catch((error) => {
        console.warn("Error: ", error);
        // Optionally handle error feedback
        alert("error.");
      });
  }
}
