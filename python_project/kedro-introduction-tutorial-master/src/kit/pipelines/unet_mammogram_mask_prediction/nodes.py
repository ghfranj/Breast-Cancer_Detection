# Copyright 2020 QuantumBlack Visual Analytics Limited
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
"""
This is a boilerplate pipeline 'mammogram_mask_prediction'
generated using Kedro 0.16.4
"""
import torchvision.transforms.functional as TF
import torch
from PIL import Image
import numpy as np
import cv2
import torchvision.transforms as transforms
from Tools.cleanMammogram import crop_borders_with_its_masks, remove_artefacts
from Tools.mask_prediction import load_model
import torchvision.transforms.functional as TF
import matplotlib.pyplot as plt
from sub_projects.Breast_Tumor_Segmentation.bts.plot import result

def clean_mask_input(img):
    img = np.asarray(img)
    img = crop_borders_with_its_masks(img)
    img = remove_artefacts(img)
    img = cv2.resize(img, (512,512))
    img = Image.fromarray(img)
    return img


def predict_unet_result(img):
    img2 = np.asarray(img).astype(np.uint8)
    device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')

    unet_classifier = load_model()
    my_default_transformation = transforms.Compose([
        transforms.Grayscale(),
        transforms.Resize((512, 512))
    ])
    img = my_default_transformation(img)
    image_tensor = TF.to_tensor(img)
    sample = {'image': image_tensor, 'mask': image_tensor}
    mask_pred= unet_classifier.predict(sample, 0.5)
    if(mask_pred.sum() <40):
        mask_pred= unet_classifier.predict(sample, 0.2)
    img2 = np.asarray([img2,img2*(1-mask_pred),img2]).transpose((1,2,0))
    mask_pred = mask_pred * 255
    t2 = Image.fromarray(img2.astype(np.uint8))
    # if t2.mode != 'RGB':
    #     t2 = t2.convert('RGB')
    t = Image.fromarray(mask_pred)
    if t.mode != 'RGB':
        t = t.convert('RGB')
    return (t,t2)

#
# def clean_raw_data(df):
#     df = df.drop(["Ticket", "Cabin"], axis=1)
#     # Remove NaN values
#     df = df.dropna()
#     return df

