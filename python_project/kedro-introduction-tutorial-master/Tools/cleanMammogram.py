import numpy as np
from PIL import Image
import cv2

# from sub_projects.Swin_Transformer_Object_Detection_master.mmdet.apis import inference_detector, init_detector, show_result_pyplot

#
# def build_detector(cfg, train_cfg=None, test_cfg=None):
#     """Build detector."""
#     if train_cfg is not None or test_cfg is not None:
#         warnings.warn(
#             'train_cfg pip uninstall mmcv-fulland test_cfg is deprecated, '
#             'please specify them in model', UserWarning)
#     assert cfg.get('train_cfg') is None or train_cfg is None, \
#         'train_cfg specified in both outer field and model field '
#     assert cfg.get('test_cfg') is None or test_cfg is None, \
#         'test_cfg specified in both outer field and model field '
#     return build(cfg, DETECTORS, dict(train_cfg=train_cfg, test_cfg=test_cfg))

def crop_borders_with_its_masks(img):
    l=0.02
    r=0.02
    u=0.07
    d=0.07
    if len(img.shape) > 2:
        img = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    nrows, ncols = img.shape
    # Get the start and end rows and columns
    l_crop = int(ncols * l)
    r_crop = int(ncols * (1 - r))
    u_crop = int(nrows * u)
    d_crop = int(nrows * (1 - d))
    cropped_img = img[u_crop:d_crop, l_crop:r_crop]
    return cropped_img

def globalBinarise(img, thresh=10, maxval=255):

    binarised_img = np.zeros(img.shape, np.uint8)
    binarised_img[img >= thresh] = maxval

    return binarised_img

def editMask(mask, ksize=(23, 23), operation="open"):

    kernel = cv2.getStructuringElement(shape=cv2.MORPH_RECT, ksize=ksize)

    if operation == "open":
        edited_mask = cv2.morphologyEx(mask, cv2.MORPH_OPEN, kernel)
    elif operation == "close":
        edited_mask = cv2.morphologyEx(mask, cv2.MORPH_CLOSE, kernel)

    # Then dilate
    edited_mask = cv2.morphologyEx(edited_mask, cv2.MORPH_DILATE, kernel)

    return edited_mask

def sortContoursByArea(contours, reverse=True):

    # Sort contours based on contour area.
    sorted_contours = sorted(contours, key=cv2.contourArea, reverse=reverse)

    # Construct the list of corresponding bounding boxes.
    bounding_boxes = [cv2.boundingRect(c) for c in sorted_contours]

    return sorted_contours, bounding_boxes

def xLargestBlobs( mask, top_x=1, reverse=True):

    # Find all contours from binarised image.
    # Note: parts of the image that you want to get should be white.
    contours, hierarchy = cv2.findContours(
        image=mask, mode=cv2.RETR_EXTERNAL, method=cv2.CHAIN_APPROX_NONE
    )

    n_contours = len(contours)

    # Only get largest blob if there is at least 1 contour.
    if n_contours > 0:

        # Make sure that the number of contours to keep is at most equal
        # to the number of contours present in the mask.
        # if n_contours < top_x or top_x == None:
        top_x = 1

        # Sort contours based on contour area.
        sorted_contours, bounding_boxes = sortContoursByArea(
            contours=contours, reverse=reverse
        )

        # Get the top X largest contours.
        X_largest_contours = sorted_contours[0:top_x]

        # Create black canvas to draw contours on.
        to_draw_on = np.zeros(mask.shape, np.uint8)

        # Draw contours in X_largest_contours.
        X_largest_blobs = cv2.drawContours(
            image=to_draw_on,  # Draw the contours on `to_draw_on`.
            contours=X_largest_contours,  # List of contours to draw.
            contourIdx=-1,  # Draw all contours in `contours`.
            color=1,  # Draw the contours in white.
            thickness=-1,  # Thickness of the contour lines.
        )

    return n_contours, X_largest_blobs

def checkLRFlip(mask):

    # Get number of rows and columns in the image.
    nrows, ncols = mask.shape
    x_center = ncols // 2
    y_center = nrows // 2

    # Sum down each column.
    col_sum = mask.sum(axis=0)
    # Sum across each row.
    row_sum = mask.sum(axis=1)

    left_sum = sum(col_sum[0:x_center])
    right_sum = sum(col_sum[x_center:-1])

    if left_sum < right_sum:
        LR_flip = True
    else:
        LR_flip = False

    return LR_flip


def makeLRFlip(img):

    flipped_img = np.fliplr(img)

    return flipped_img

def clahe(img, clip=2.0, tile=(8, 8)):

    img = cv2.normalize(
        img,
        None,
        alpha=0,
        beta=255,
        norm_type=cv2.NORM_MINMAX,
        dtype=cv2.CV_32F,
    )
    img_uint8 = img.astype("uint8")

    clahe_create = cv2.createCLAHE(clipLimit=clip, tileGridSize=tile)
    clahe_img = clahe_create.apply(img_uint8)

    return clahe_img

def remove_artefacts(img, with_clahe = True):
    mask = editMask(globalBinarise(img))
    t = xLargestBlobs(mask)
    img1 = t[1]*img
    if with_clahe:
        img1 = clahe(img1)
    if checkLRFlip(img1):
      img1 = makeLRFlip(img1)
    return img1
