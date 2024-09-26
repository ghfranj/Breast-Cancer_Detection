

from sub_projects.Breast_Tumor_Segmentation.bts import classifier as classifier, model as model, plot as plot
import os
import torch
import logging
# Dataset part used for testing
TEST_SPLIT = 0.2
# Batch size for training. Limited by GPU memory
BATCH_SIZE = 6
# Filters used in UNet Model
FILTER_LIST = [16,32,64,128,256]
def load_model():
    MODEL_NAME = 'breast-UNet-[16, 32, 64, 128, 256]_0.2995835249952233.pt'
    MODEL_NAME = 'initial_rotation_only_25_to_25_2_2_0.5763939125788177.pt'
    device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')
    unet_model = model.DynamicUNet(FILTER_LIST)
    unet_classifier = classifier.BrainTumorClassifier(unet_model, device)
    unet_classifier.restore_model(os.path.join('data/06_models/', MODEL_NAME))
    return unet_classifier
