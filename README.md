


https://github.com/user-attachments/assets/3feb3064-8dc8-40ad-80d4-52815e6dd35e



<p align="left">
    
  <!-- Kedro -->
  <a href="https://kedro.readthedocs.io/en/stable/"><img src="https://img.shields.io/badge/docs-kedro-blue.svg" alt="Kedro Documentation"></a>
  
  <!-- Laravel -->
  <a href="https://github.com/laravel/laravel"><img src="https://img.shields.io/github/stars/laravel/laravel?style=social" alt="Laravel GitHub Stars"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Laravel Total Downloads"></a>
  
  <!-- Swin Transformer -->
  <a href="https://github.com/microsoft/Swin-Transformer"><img src="https://img.shields.io/github/stars/microsoft/Swin-Transformer?style=social" alt="Swin Transformer GitHub Stars"></a>
  <a href="https://arxiv.org/abs/2103.14030"><img src="https://img.shields.io/badge/paper-arXiv-brightgreen" alt="Swin Transformer arXiv Paper"></a>
  
  <!-- CNN (Convolutional Neural Networks) -->
  <a href="https://cs231n.github.io/convolutional-networks/"><img src="https://img.shields.io/badge/learn-CNN-blue.svg" alt="Learn CNN"></a>
  
  <!-- Torch -->
  <a href="https://pytorch.org/"><img src="https://img.shields.io/badge/docs-pytorch-red.svg" alt="PyTorch Documentation"></a>
  <a href="https://github.com/pytorch/pytorch"><img src="https://img.shields.io/github/stars/pytorch/pytorch?style=social" alt="PyTorch GitHub Stars"></a>
</p>

### **README.md for your Project**

---

# Breast Cancer Detection Using Kedro and Swin Transformer

## Project Overview

This project aims to build a pipeline for breast cancer detection using Kedro and Swin Transformer for object detection and classification. The project is structured as a Kedro-based project, with additional components related to Swin Transformer for deep learning tasks.

### Project Structure:
- Path: `\breastCancer\python_project\kedro-introduction-tutorial-master`
- Subproject: `Swin_Transformer_Object_Detection_master` for deep learning-based object detection using the Swin Transformer model.

## Setup Instructions

### Step 1: Setting Up the Environment

First, you need to set up the virtual environment (venv) and install all necessary dependencies. Follow the steps below.

### Create and Activate Virtual Environment:

```bash
# Create the virtual environment named venv2
python -m venv venv2

# Activate the virtual environment
# On Windows:
venv2\Scripts\activate

# On Linux or MacOS:
source venv2/bin/activate
```

### Step 2: Install Kedro and Requirements

Navigate to the main project directory and install the necessary dependencies.

```bash
cd \breastCancer\python_project\kedro-introduction-tutorial-master

# Install Kedro version 0.16.5 and additional dependencies
pip install kedro==0.16.5
pip install kedro[pandas]==0.16.5  # Pandas installed separately due to pip bug
pip install kedro-viz scipy matplotlib  # Additional requirements
```

### Step 3: Install Swin Transformer Dependencies

The project utilizes Swin Transformer for object detection. To set up this module, navigate to the `Swin_Transformer_Object_Detection_master` subproject and install the relevant requirements.

```bash
cd sub_projects\Swin_Transformer_Object_Detection_master

# Install requirements from build.txt, docs.txt, and runtime.txt
pip install -r requirements\build.txt
pip install -r requirements\docs.txt
pip install -r requirements\runtime.txt
```

Once these steps are completed, you should have all necessary packages and libraries installed.

---

## About the Project

### 1. **Kedro**
Kedro is used to structure the pipeline for data processing, model training, and evaluation. Kedro helps in creating modular, scalable, and reproducible workflows.

### 2. **Swin Transformer**
Swin Transformer is a state-of-the-art model for object detection and image classification. It is utilized in this project for detecting cancerous regions from medical images.

### 3. **Project Goals**
- Create a scalable pipeline for breast cancer detection using deep learning models.
- Use Swin Transformer to enhance detection accuracy.
- Structure the workflow using Kedro for efficient data handling and model integration.

---

## Key Features

- **Modular pipeline**: The project is structured using Kedro to provide clear separation of concerns and enhance reproducibility.
- **Swin Transformer for Detection**: Integration of the Swin Transformer model for accurate object detection and classification of breast cancer images.
- **Visualization**: Use `kedro-viz` and `matplotlib` for visualizing pipeline components and model results.

---

## Running the Project

After setting up the environment and installing all requirements, you can run the project using the following commands:

1. **Running Kedro pipeline**:

   ```bash
   kedro run
   ```

2. **Visualizing the pipeline**:

   ```bash
   kedro viz
   ```

---

## Learning Resources

1. [Kedro Documentation](https://kedro.readthedocs.io/en/stable/)
2. [Swin Transformer GitHub Repo](https://github.com/microsoft/Swin-Transformer)

---

## Contributing

If you'd like to contribute to this project, feel free to open a pull request or reach out with any suggestions.

---

## License

This project is licensed under the MIT License. See the [LICENSE](https://opensource.org/licenses/MIT) file for more details.

